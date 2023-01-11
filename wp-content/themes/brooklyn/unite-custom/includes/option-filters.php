<?php

function _ut_page_options_support( $option_id ) {

    return $option_id;

}

add_filter( 'ut_collect_option', '_ut_page_options_support', 20, 1 );


 /**
   * Archive Filters
   */ 

function _ut_archive_options_support( $option_id ) {
	
	if( !is_archive() || ut_is_shop() ) {
		
		return $option_id;
		
	}
	
	$custom_options = array(
		
		'ut_global_hero_background_color'				=> 'ut_archive_hero_background_color',
		
		// scroll down arrow
		'ut_global_scroll_down_arrow_color' 			=> 'ut_archive_hero_down_arrow_color',
		'ut_global_scroll_down_arrow_position'  		=> 'ut_archive_hero_down_arrow_scroll_position',
		'ut_global_scroll_down_arrow_position_vertical' => 'ut_archive_hero_down_arrow_scroll_position_vertical'
	
	);
	
    return $custom_options[$option_id] ?? $option_id;

}

add_filter( 'ut_collect_option', '_ut_archive_options_support', 30, 1 );



 /**
   * Search Filters
   */ 

function _ut_search_options_support( $option_id ) {
	
	if( !is_search() ) {
		
		return $option_id;
		
	}
	
	$custom_options = array(
		
		'ut_global_hero_background_color'  				=> 'ut_search_hero_background_color',
		
		// scroll down arrow
		'ut_global_scroll_down_arrow_color' 			=> 'ut_search_hero_down_arrow_color',
		'ut_global_scroll_down_arrow_position'  		=> 'ut_search_hero_down_arrow_scroll_position',
		'ut_global_scroll_down_arrow_position_vertical' => 'ut_search_hero_down_arrow_scroll_position_vertical'
	
	);
	
	return $custom_options[$option_id] ?? $option_id;

}

add_filter( 'ut_collect_option', '_ut_search_options_support', 30, 1 );


 /**
   * 404 Mode Filters
   */ 

function _ut_404_options_support( $option_id ) {
	
	if( !is_404() ) {
		
		return $option_id;
		
	}
	
	$custom_options = array(

		// hero background
		'ut_global_hero_background_color' => 'ut_404_hero_background_color'
	
	);
	
	return $custom_options[$option_id] ?? $option_id;

}

add_filter( 'ut_collect_option', '_ut_404_options_support', 40, 1 );


 /**
   * Maintenance Mode Filters
   */ 

function _ut_maintenance_options_support( $option_id ) {
	
	if( !apply_filters( 'ut_maintenance_mode_active', false ) ) {
		
		return $option_id;
		
	}
	
	$custom_options = array(

		// hero background
		'ut_global_hero_background_color' => 'ut_maintenance_hero_background_color'
	
	);
	
	return $custom_options[$option_id] ?? $option_id;

}

add_filter( 'ut_collect_option', '_ut_maintenance_options_support', 40, 1 );


 /**
   * Font Type Relations Filters
   */

function _ut_font_type_relations( $font_type, $type ) {

	$type_relations = apply_filters( 'ut_font_type_relations', array(

	    'ut_front_catchphrase_top_font_type' => array(
            'ut-font'   => 'ut_front_catchphrase_top_font_style',
	        'ut-websafe'=> 'ut_front_catchphrase_top_websafe_font_style',
	        'ut-google' => 'ut_google_front_catchphrase_top_font_style',
            'ut-custom' => 'ut_front_catchphrase_top_custom_font_style'
        ),
        'ut_front_catchphrase_font_type' => array(
            'ut-font'   => 'ut_front_catchphrase_font_style',
	        'ut-websafe'=> 'ut_front_catchphrase_websafe_font_style',
	        'ut-google' => 'ut_google_front_catchphrase_font_style',
            'ut-custom' => 'ut_front_catchphrase_custom_font_style'
        )

    ));

	return $type_relations[$font_type][$type] ?? '';

}