<?php

/*
|--------------------------------------------------------------------------
| Contact Section Video Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_csection_bg_video') ) :
    
    function ut_create_csection_bg_video() {
        
        /* settings */        
        $playerconfig = array();
        $ut_csection_video_source = ot_get_option('ut_csection_video_source' , 'youtube');
        
        if( $ut_csection_video_source == 'youtube' ) {
            $ut_csection_video = ot_get_option('ut_csection_video');
            if(isset($ut_csection_video) && $ut_csection_video != '') { array_push($playerconfig, 'video="'.$ut_csection_video.'"'); }
        }
                    
        if( $ut_csection_video_source == 'selfhosted' ) {
            $ut_csection_video_mp4 = ot_get_option('ut_csection_video_mp4');
            if(isset($ut_csection_video_mp4) && $ut_csection_video_mp4 != '') { array_push($playerconfig, 'mp4="'.$ut_csection_video_mp4.'"'); }
            
            $ut_csection_video_ogg = ot_get_option('ut_csection_video_ogg');
            if(isset($ut_csection_video_ogg) && $ut_csection_video_ogg != '') { array_push($playerconfig, 'ogg="'.$ut_csection_video_ogg.'"'); }
            
            $ut_csection_video_webm = ot_get_option('ut_csection_video_webm');
            if(isset($ut_csection_video_webm) && $ut_csection_video_webm != '') { array_push($playerconfig, 'webm="'.$ut_csection_video_webm.'"'); }
            
            $ut_csection_video_preload = ot_get_option('ut_csection_video_preload');
            if(isset($ut_csection_video_preload) && $ut_csection_video_preload != '') { array_push($playerconfig, 'preload="'.$ut_csection_video_preload.'"'); }
        }
        
        $ut_csection_video_loop = ot_get_option('ut_csection_video_loop');
        if(isset($ut_csection_video_loop) && $ut_csection_video_loop != '') { array_push($playerconfig, 'loop="'.$ut_csection_video_loop.'"'); }
        
        $ut_csection_video_volume = ot_get_option('ut_csection_video_volume');
        if(isset($ut_csection_video_volume) && $ut_csection_video_volume != '') { array_push($playerconfig, 'volume="'.$ut_csection_video_volume.'"'); }
        
        $ut_csection_video_sound = ot_get_option('ut_csection_video_sound');
        if(isset($ut_csection_video_sound) && $ut_csection_video_sound != '') { array_push($playerconfig, 'sound="'.$ut_csection_video_sound.'"'); }
        
        $ut_csection_video_mute_button = ot_get_option('ut_csection_video_mute_button' , true );
        if(isset($ut_csection_video_mute_button) && $ut_csection_video_mute_button != '') { array_push($playerconfig, 'mutebutton="'.$ut_csection_video_mute_button.'"'); }
        
        echo do_shortcode('[ut_section_video id="contact-section-video" section="#contact-section" source="'.$ut_csection_video_source.'" '.implode(" ", $playerconfig).']');        
        
    }
    
endif; 

/*
|--------------------------------------------------------------------------
| Create Background Video Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_bg_videoplayer') ) :

    function ut_create_bg_videoplayer( $call = '' ) {
        
        $player = NULL;
        $video_url = NULL;
        $youtube = false;
        $vimeo = false;
        $custom = false;
        $selfhosted = false;        
        $containment = ( ut_return_hero_config('ut_video_containment' , 'hero') == 'body' ) ? 'body' : '#ut-hero';
                          
        // check if youtube
        if( ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' ) {
            $youtube = true;
        }

        // check if vimeo
        if( ut_return_hero_config('ut_video_source' , 'youtube') == 'vimeo' ) {
            $vimeo = true;
        }

        // check if custom video
        if( ut_return_hero_config('ut_video_source' , 'youtube') == 'custom' ) {
            $custom = true;
        } 

        // check if selfhosted
        if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' ) {
            $selfhosted = true;
        }           

        // conditional to prevent selfhosted video displaying inside hero if it has been set to background
        if( $selfhosted && ut_return_hero_config('ut_video_containment', 'hero') == 'body' && $call == 'section' ) {
            return;
        }

        // conditional to prevent selfhosted video displaying inside the background if it has been set to hero
        if( $selfhosted && ut_return_hero_config('ut_video_containment', 'hero') == 'hero' && $call == 'body' ) {
            return;
        }            

        if( $youtube ) {

            $video_url = ut_return_hero_config('ut_video_url');

            // alternate mobile video
            if( !empty( ut_return_hero_config('ut_video_url_mobile') ) && function_exists('unite_mobile_detection') && unite_mobile_detection()->isMobile() && !unite_mobile_detection()->isTablet() ) {

                $video_url = ut_return_hero_config('ut_video_url_mobile');

            }

            if( !empty($video_url) ) :

                $muted   = ut_return_hero_config('ut_video_mute_state' , "off");
                $muted   = ($muted == 'off') ? 'mute : true' : 'mute : false';
                $volume  = ut_return_hero_config('ut_video_volume' , "5") ;
                $volume  = ($muted == 'off') ? 'vol : 0' : 'vol: ' . $volume;
                $loop    = ut_return_hero_config('ut_video_loop' , "on") ;
                $loop    = ($loop == 'on') ? 'loop : true' : 'loop : false';
                $quality = !empty( $quality ) ? $quality : 'default';

                $startAt = ut_return_hero_config('ut_video_start_at' , "0" ) ;
                $startAt = !empty( $startAt ) ? $startAt : '0';
                $stopAt  = ut_return_hero_config('ut_video_stop_at' , "0" ) ;
                $stopAt  = !empty( $stopAt ) ? $stopAt : '0';

                /* build player */
                $player .= '<a id="ut-background-video-hero" class="ut-video-player" data-property="{ videoURL : \'' . $video_url . '\' , containment : \'' . $containment . '\', showControls: false, autoPlay : true, '.$loop.', '.$muted.', '.$volume.', startAt : '.$startAt.', stopAt : ' . $stopAt . ', opacity : 1, abundance : 0}"></a>';

                return $player;

            endif;

        } 

        if( $vimeo && $call == 'section' ) {

            $video_url = ut_return_hero_config('ut_video_vimeo_url');

            if( class_exists('UT_Section_Video_player') && $video_url ) {

                $video = new UT_Section_Video_player();

                return $video::handle_shortcode( array(
                    'id'            => 'hero',
                    'section'       => '#ut-hero',   
                    'source'        => 'vimeo',
                    'volume'        => ut_return_hero_config('ut_video_volume' , "5"),
                    'sound'         => ut_return_hero_config('ut_video_mute_state' , "off"),
                    'loop'          => ut_return_hero_config('ut_video_loop' , "on"),
                    'video_vimeo'   => $video_url,
                    'dnt'           => ut_return_hero_config('ut_video_vimeo_tracking', false )
                ) );

            }

        }        

        if( $selfhosted )  {

            $mp4 = ut_return_hero_config('ut_video_mp4');
            $ogg = ut_return_hero_config('ut_video_ogg');
            $webm = ut_return_hero_config('ut_video_webm');

            $tablet_version = ut_return_hero_config('ut_video_tablet_version', 'off');
            $mp4_tablet = ut_return_hero_config('ut_video_tablet_mp4');
            $ogg_tablet = ut_return_hero_config('ut_video_tablet_ogg');
            $webm_tablet = ut_return_hero_config('ut_video_tablet_webm');

            $mobile_version = ut_return_hero_config('ut_video_mobile_version', 'off');
            $mp4_mobile = ut_return_hero_config('ut_video_mobile_mp4');
            $ogg_mobile = ut_return_hero_config('ut_video_mobile_ogg');
            $webm_mobile = ut_return_hero_config('ut_video_mobile_webm');

            if( !empty($mp4) || !empty($ogg) || !empty($webm) ) :

                $volume  = ut_return_hero_config('ut_video_volume' , "5") ;
                $muted   = ut_return_hero_config('ut_video_mute_state' , "off");
                $loop    = ut_return_hero_config('ut_video_loop' , "on") ;
                $preload = ut_return_hero_config('ut_video_preload' , "on") ;
                $preload = ($preload == 'on') ? 'auto' : '';

	            // Background Player
	            $video = new UT_Background_Video_Player();

	            return $video->handle_shortcode( array(
		            'id'                    => 'ut-hero-video',
		            'containment'           => '#ut-hero',
		            'source'                => 'selfhosted',
		            'play_event'            => 'on_appear',
		            'lazy_load'             => true,
		            'loop'                  => $loop,
		            'mp4'                   => $mp4,
		            'ogg'                   => $ogg,
		            'webm'                  => $webm,
                    'tablet_version'        => $tablet_version,
                    'mp4_tablet'            => $mp4_tablet,
		            'ogg_tablet'            => $ogg_tablet,
		            'webm_tablet'           => $webm_tablet,
                    'mobile_version'        => $mobile_version,
                    'mp4_mobile'            => $mp4_mobile,
		            'ogg_mobile'            => $ogg_mobile,
		            'webm_mobile'           => $webm_mobile,
		            'sound'                 => $muted,
		            'volume'                => $volume,
		            'preload'               => $preload
	            ) );




            endif; /* check for player files */

        }

        if( $custom && $call != 'body' )  {

            $video_embedded = ut_return_hero_config('ut_video_url_custom');
            $player .= do_shortcode($video_embedded);

        }
        
        return $player;
        
    }
    
endif;


/*
|--------------------------------------------------------------------------
| Front Page Video Background Player
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_create_front_bg_video') ) :
    
    function ut_create_front_bg_video() {
        
        /* settings */        
        $playerconfig = array();
        
        /* video has been turn off or we are not on the front page */
        if( ot_get_option('ut_front_bg_video_state' , 'off' ) == 'off' || !is_front_page() ) {
            return;
        }            
        
        if( ot_get_option('ut_front_bg_video_source' , 'youtube') == 'youtube' ) {
            
            $ut_front_bg_video_youtube = ot_get_option('ut_front_bg_video_youtube');
            if( isset($ut_front_bg_video_youtube) && $ut_front_bg_video_youtube != '' ) { 
                array_push($playerconfig, 'video="' . $ut_front_bg_video_youtube . '"'); 
            }
            
        }
        
        if( ot_get_option('ut_front_bg_video_source' , 'youtube') == 'selfhosted' ) {
            
            $ut_front_bg_video_mp4 = ot_get_option('ut_front_bg_video_mp4');
            if( isset($ut_front_bg_video_mp4) && $ut_front_bg_video_mp4 != '' ) { 
                array_push($playerconfig, 'mp4="' . $ut_front_bg_video_mp4 . '"'); 
            }
            
            $ut_front_bg_video_ogg = ot_get_option('ut_front_bg_video_ogg');
            if( isset($ut_front_bg_video_ogg) && $ut_front_bg_video_ogg != '' ) { 
                array_push($playerconfig, 'ogg="' . $ut_front_bg_video_ogg . '"'); 
            }
            
            $ut_front_bg_video_webm = ot_get_option('ut_front_bg_video_webm');
            if( isset($ut_front_bg_video_webm) && $ut_front_bg_video_webm != '' ) { 
                array_push($playerconfig, 'webm="' . $ut_front_bg_video_webm . '"'); 
            }
            
            $ut_csection_video_preload = ot_get_option('ut_csection_video_preload');
            if( isset($ut_csection_video_preload) && $ut_csection_video_preload != '' ) { 
                array_push($playerconfig, 'preload="' . $ut_csection_video_preload . '"'); 
            }
            
        }
        
        $ut_front_bg_video_volume = ot_get_option('ut_front_bg_video_volume');
        if( isset($ut_front_bg_video_volume) && $ut_front_bg_video_volume != '' ) { 
            array_push($playerconfig, 'volume="' . $ut_front_bg_video_volume . '"'); 
        }
        
        $ut_front_bg_video_mute_button = ot_get_option('ut_front_bg_video_mute_button' , true );
        if(isset($ut_front_bg_video_mute_button) && $ut_front_bg_video_mute_button != '') { 
            array_push($playerconfig, 'mutebutton="' . $ut_front_bg_video_mute_button . '"'); 
        }        
        
        echo do_shortcode('[ut_section_video id="front-bg-vid" section="body" source="' . ot_get_option('ut_front_bg_video_source' , 'youtube') . '" ' . implode(" ", $playerconfig) . ']');
        
    }

endif;


?>