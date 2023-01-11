<?php

 /**
   * Deprecated Theme Option Keys
   */ 

function _ut_deprecated_theme_options_keys( $option_id ) {
	
	// old > new
	$option_keys = array(
		
		// caption title
		'ut_global_hero_company_slogan_color'				=> 'ut_global_caption_title_color',
		
		// caption slogan update
		'ut_global_hero_expertise_slogan_color' 			=> 'ut_global_caption_slogan_color',
		'ut_global_hero_expertise_slogan_background_color'  => 'ut_global_caption_slogan_background_color',
		'ut_global_hero_expertise_slogan_border_color'		=> 'ut_global_caption_slogan_border_color'
		

	);
	
	return $option_keys;

}

add_filter( 'ut_deprecated_option_keys', '_ut_deprecated_theme_options_keys', 20, 1 );