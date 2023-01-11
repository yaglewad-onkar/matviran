    <?php if( is_singular('product')  ) {

        // @todo move into shop single pages with next update
        edit_post_link(esc_html__('Edit Product', 'unitedthemes'), '<span class="edit-link">', '</span>');

    } ?>

    </div><!-- close main-content-background -->
        
    <div class="clear"></div>
        
    <?php ut_before_footer_hook(); ?>
    
    <?php 

    $current = get_queried_object(); 
    $post_ID = $current->ID ?? '';

	if( ut_return_csection_config('ut_activate_csection', 'on') == 'on' ) :
	
		if( !apply_filters( 'ut_contact_section_is_cblock', false ) ) {
			
			// custom contact section classes
			$csection_classes = array();
            $csection_title_classes = array();

			$csection_classes[] = ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' ? 'ut-contact-section-scroll-top' : '';
			$csection_classes[] = !unite_mobile_detection()->isMobile() && ot_get_option( 'ut_csection_parallax', 'off' ) == 'on' ? 'parallax-background parallax-section' : 'normal-background';
			$csection_classes[] = ot_get_option( 'ut_csection_skin' );

			// section header style
			$ut_csection_header_style = ot_get_option( 'ut_csection_header_style', 'pt-style-1' );
			$ut_csection_header_style = ( $ut_csection_header_style == 'global' ) ? ot_get_option( 'ut_global_headline_style' ) : $ut_csection_header_style;
            $ut_csection_title_align = 'header-' . ot_get_option( 'ut_csection_header_align', 'center' );

			// section header style 1
			$ut_csection_title_style = ( ot_get_option( 'ut_csection_title_style_1_type', 'global' ) == 'global' ) ? ot_get_option( 'ut_global_page_headline_style_1_type', 'section' ) : ot_get_option( 'ut_csection_title_style_1_type', 'section' );

            // Title Glitch effect
            $csection_title_classes[] = ot_get_option( 'ut_csection_header_glitch', 'off' ) == 'on' ? 'ut-glitch' : '';
            $csection_title_classes[] = ot_get_option( 'ut_csection_header_glitch', 'off' ) == 'on' ? ot_get_option( 'ut_csection_header_glitch_style', 'ut-glitch-1' ) : '';

            // Distortion Effect
            $glitch_classes = array();
            $glitch_attributes = array();

            if( ot_get_option( 'ut_csection_header_glitch_appear', 'off' ) != 'off' ) {

                // Glitch on Appear
                if( ot_get_option( 'ut_csection_header_glitch_appear', 'off' ) == 'on_appear' ) {

                    $glitch_classes[] = 'ut-glitch-on-appear';
                    $glitch_attributes['data-ut-glitch-class'] = 'ut-simple-glitch-text-' . ot_get_option( 'ut_csection_header_glitch_appear_style', 'style-1' );

                }

                // Glitch Permanent
                if( ot_get_option( 'ut_csection_header_glitch_appear', 'off' ) == 'permanent' ) {

                    $glitch_classes[] = 'ut-simple-glitch-text-permanent';
                    $glitch_classes[] = 'ut-simple-glitch-text-' . ot_get_option( 'ut_csection_header_glitch_appear_style', 'style-1' ) . '-permanent';

                }

            }

            // attributes string
            $glitch_attributes = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
                $glitch_attributes,
                array_keys( $glitch_attributes )
            ) );

            // title glow effect
            $csection_title_classes[] = ot_get_option( 'ut_csection_header_glow', 'off' ) == 'on' ? 'ut-glow' : '';
            $csection_title_classes[] = ot_get_option( 'ut_csection_header_stroke_effect', 'off' ) == 'on' ? 'ut-text-stroke' : '';

			// contact section background and overlay - available inside theme options as well as on pages
			$ut_csection_overlay = ut_return_csection_config( 'ut_csection_overlay', 'on' );
			$csection_classes[] = $ut_csection_overlay == 'on' ? 'ut-contact-section-with-overlay' : 'ut-contact-section-without-overlay';    

			// contact section background and overlay - currently only located inside theme options panel
			$ut_csection_background_type = ot_get_option( 'ut_csection_background_type', 'image' );
			$ut_csection_overlay_pattern = ot_get_option( 'ut_csection_overlay_pattern', 'off' ) == 'on' ? 'parallax-overlay-pattern' : '';

			// google map 
			$ut_csection_map = ot_get_option( 'ut_csection_map' );
			$csection_classes[] = $ut_csection_map && $ut_csection_background_type == 'map' ? 'contact-map' : '';

			// section video class
			$ut_csection_video_source = ot_get_option( 'ut_csection_video_source', 'youtube' );
			$csection_classes[] = $ut_csection_background_type == 'video' && $ut_csection_video_source == 'selfhosted' ? 'ut-video-section' : '';

			// contact section areas
			$ut_left_csection_content_area = ot_get_option( 'ut_left_csection_content_area' );
			$ut_right_csection_content_area = ot_get_option( 'ut_right_csection_content_area' );

			$ut_left_csection_content_area_width = !empty( $ut_right_csection_content_area ) ? 'grid-50 mobile-grid-100 tablet-prefix-15 tablet-grid-75' : 'grid-100 mobile-grid-100 tablet-grid-100';
			$ut_right_csection_content_area_width = !empty( $ut_left_csection_content_area ) ? 'grid-50 mobile-grid-100 tablet-prefix-15 tablet-grid-75' : 'grid-100 mobile-grid-100 tablet-grid-100';
			
			
		} ?>
    	
		<?php if( !apply_filters( 'ut_contact_section_is_cblock', false ) ) : ?>

			<section id="contact-section" data-effect="fadeIn" class="animated contact-section <?php echo implode(" ", $csection_classes); ?>">   		

				<a class="ut-offset-anchor" id="section-contact"></a> 

				<?php if( ot_get_option('ut_csection_parallax' , 'off') == 'on' && !unite_mobile_detection()->isMobile() ) : ?>

					<div class="parallax-scroll-container" data-parallax-bottom data-parallax-factor="8"></div>

				<?php endif; ?>        

				<?php if( $ut_csection_map && $ut_csection_background_type == 'map' ) : ?>       

					<div class="background-map"><?php echo do_shortcode($ut_csection_map); ?></div>

				<?php endif; ?>

				<?php if( $ut_csection_background_type == 'video' ) : ?>

					<?php ut_create_csection_bg_video(); ?>

				<?php endif; ?>

				<?php if( $ut_csection_overlay == 'on' ) : ?>

					<div class="parallax-overlay <?php echo $ut_csection_overlay_pattern; ?> <?php echo ot_get_option( 'ut_csection_overlay_pattern_style' , 'style_one' ); ?>">

				<?php endif; ?>

				<div class="grid-container parallax-content">

					<?php 

					// contact section headline 
					$ut_csection_header_slogan = ot_get_option( 'ut_csection_header_slogan' );
					$ut_csection_header_expertise_slogan = ot_get_option( 'ut_csection_header_expertise_slogan' );            

					if( !empty($ut_csection_header_slogan) || !empty($ut_csection_header_expertise_slogan) ) : ?>

					<!-- parallax header -->
					<div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">

						<header class="csection-title <?php echo $ut_csection_title_style; ?>-header <?php echo $ut_csection_header_style; ?> ut-no-lead-linebreak-mobile <?php echo $ut_csection_title_align; ?>">

                            <?php if( !empty( $glitch_classes ) ) : ?>

                                <div class="<?php echo implode( " ", $glitch_classes ); ?>" <?php echo $glitch_attributes; ?>>

                            <?php endif; ?>

							<?php if( !empty( $ut_csection_header_slogan ) ) : ?>

                                <?php

                                $ut_data_csection_header_slogan = str_replace( "\n","&#13;&#10;", strip_tags( $ut_csection_header_slogan ) );

                                // check if title contains linebreaks
                                if( strpos($ut_data_csection_header_slogan, "\n") !== FALSE ) {

                                    $csection_title_classes[] = 'title-with-linebreak';

                                } ?>

								<?php if( $ut_csection_header_style == 'pt-style-1' ) : ?>

									<h2 data-title="<?php echo esc_attr( $ut_data_csection_header_slogan ); ?>" data-responsive-font="contact_section_title" class="bklyn-divider-styles bklyn-divider-style-1 <?php echo $ut_csection_title_style; ?>-title <?php echo implode(" ", $csection_title_classes );?>">
                                        <span><?php echo do_shortcode( nl2br( $ut_csection_header_slogan ) ); ?></span>
                                    </h2>

								<?php else : ?>

                                    <h2 data-title="<?php echo esc_attr( $ut_data_csection_header_slogan ); ?>" data-responsive-font="contact_section_title" class="<?php echo ot_get_option('ut_csection_parallax' , 'off') == 'off' ? 'section-title' : 'parallax-title'; ?> <?php echo implode(" ", $csection_title_classes );?>">

                                        <span><?php echo do_shortcode( nl2br( $ut_csection_header_slogan ) ); ?></span>

                                        <?php if( ( $ut_csection_header_style == 'pt-style-3' || $ut_csection_header_style == 'pt-style-5' ) && ot_get_option( 'ut_csection_header_glitch', 'off' ) == 'on' ) : ?>

                                            <div><?php echo do_shortcode( nl2br( $ut_csection_header_slogan ) ); ?></div>

                                        <?php endif; ?>

                                    </h2>

								<?php endif; ?>

							<?php endif; ?>

                            <?php if( !empty( $glitch_classes ) ) : ?>

                                </div>

                            <?php endif; ?>

							<?php if( !empty( $ut_csection_header_expertise_slogan ) ) : ?>

								<div class="lead"><p><?php echo do_shortcode( nl2br( $ut_csection_header_expertise_slogan ) ); ?></p></div>

							<?php endif; ?>

						</header>

					</div>
					<!-- close parallax header -->

					<div class="clear"></div>

					<?php endif; ?>

				</div>
				<div class="grid-container section-content">

					<!-- contact wrap -->
					<div class="grid-100 mobile-grid-100 tablet-grid-100 grid-parent">
						<div class="contact-wrap clearfix">

							<?php if( !empty( $ut_left_csection_content_area ) ) : ?>

							<!-- contact message -->
							<div class="<?php echo $ut_left_csection_content_area_width; ?>">
								<div class="ut-left-footer-area clearfix">

									<?php echo do_shortcode(wpautop( $ut_left_csection_content_area )); ?>

								</div>
							</div><!-- close contact message -->

							<?php endif; ?>

							<?php if( !empty($ut_right_csection_content_area) ) :?>

							<!-- contact form-holder -->
							<div class="<?php echo $ut_right_csection_content_area_width; ?>">
								<div class="ut-right-footer-area clearfix">

									<?php echo do_shortcode(wpautop( $ut_right_csection_content_area )); ?>

								</div>
							</div><!-- close contact-form-holder -->

							<?php endif; ?>                    

						</div>
					</div><!-- close contact wrap -->


				</div><!-- close container -->

				<?php if( ot_get_option( 'ut_csection_fancy_border' ) == 'on') : ?>

					<div class="ut-fancy-border"></div>

				<?php endif; ?>

				<?php if( $ut_csection_overlay == 'on' ) : ?>

				</div><!-- parallax overlay -->

				<?php endif; ?>

			</section>

			<div class="clear"></div>

		<?php endif; //is content block ?>

    <?php endif; //#ut_activate_csection ?>    
    
    </div><!-- close #main-content -->
    
    <?php // Footer Section opening tag in sidebar-footer.php ?>
          
        <?php get_sidebar( 'footer' ); ?>                
        
        <?php if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' && ut_search_result_status() ) : ?>
        
            <a href="#top" class="toTop"><i class="Bklyn-Core-Solid-Up-3"></i></a>
    	
        <?php endif; ?>        
        
        
        <?php if( ut_page_option( 'ut_subfooterarea', 'on' ) == 'on' ) :

	        $footer_cursor_skin     = ut_page_option( 'ut_footer_cursor_skin', 'global' );
	        $sub_footer_cursor_skin = ut_page_option( 'ut_sub_footer_cursor_skin', 'footer' ) == 'footer' ? $footer_cursor_skin : ut_page_option( 'ut_sub_footer_cursor_skin' ); ?>

            <div class="footer-content" data-cursor-skin="<?php esc_attr_e( $sub_footer_cursor_skin ); ?>">

                <div class="grid-container">

                    <?php if( ot_get_option( 'ut_subfooter_border_top_color' ) && ot_get_option('ut_subfooter_border_top_width', 'centered') == 'centered' && get_post_meta( $post_ID, 'ut_page_subfooter_border_top', true ) != 'on' ) : ?>

                        <div class="grid-100 hide-on-mobile tablet-grid-100"><div class="ut-sub-footer-border-top"></div></div>

                    <?php endif; ?>

                    <div class="grid-100 mobile-grid-100 tablet-grid-100 ut-sub-footer-<?php echo ot_get_option( 'ut_subfooter_style' , 'style-1'); ?> <?php echo ot_get_option( 'ut_subfooter_style' , 'style-2') && ot_get_option('ut_subfooter_style_reverse', 'no') == 'yes' ? '' : 'ut-sub-footer-style-2-reverse'; ?>">

                        <?php 

                            $social = ot_get_option('ut_footer_social_icons');

                            if( is_array( $social ) && !empty( $social ) ) {

                                echo '<div class="ut-sub-footer-social-icons"><ul class="ut-footer-so">';    

                                    foreach( $social as $icon => $value) {

                                        $link  = !empty( $value["link"] )  ? $value["link"] : '#' ;
                                        $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

                                        echo '<li>';
                                            echo '<a target="_blank" ' . $title . ' href="' . esc_url( $link ) . '"><i class="fa ' . esc_attr( $value["icon"] ) . ' fa-lg"></i></a>';
                                        echo '</li>';

                                    }

                                echo '</ul></div>';    

                            } 

                            unset($social);

                        ?>

                        <div class="ut-sub-footer-content">    

                        <?php echo do_shortcode( nl2br( ot_get_option('ut_site_copyright') ) ); ?>

                        <span class="copyright">

                            <?php if( ot_get_option('ut_subfooter_copyright', 'off' ) == 'off' || !ot_get_option( 'ut_subfooter_copyright_text' ) ) : ?>

                                <?php bloginfo( 'name' ); ?> <?php printf( __( 'POWERED BY %2$s', 'unitedthemes' ), date("Y"), '<a href="http://unitedthemes.com/" data-rel="designer">United Themes™</a>' ); ?>

                            <?php else : ?>

                                <?php echo  do_shortcode( nl2br( ot_get_option( 'ut_subfooter_copyright_text' ) ) ); ?>

                            <?php endif; ?>

                        </span>

                        </div><!-- close sub footer -->        

                    </div>

                </div><!-- close container -->        

            </div><!-- close footer content -->
        
        <?php endif; ?>
        
        <?php ut_after_footer_content_hook(); // action hook, see inc/ut-theme-hooks.php ?>               
                
	</footer><!-- close footer -->

    <?php ut_after_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>

    <?php wp_footer(); ?>    
    
	<script type="text/javascript">

		<?php ut_java_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>
		     
    </script>

    <?php ut_after_java_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>

    <?php echo ut_create_bg_videoplayer('body'); ?>

    </body>
    
</html>