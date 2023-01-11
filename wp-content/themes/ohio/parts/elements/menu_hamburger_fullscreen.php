<?php
$menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );

if ($menu_type != 'full') {
	switch ( OhioOptions::get( 'page_fullscreen_menu_style', 'default' ) ) {
		case 'centered':
			get_template_part( 'parts/elements/fullscreen_menu/centered' );
			break;
		case 'split':
			get_template_part(  'parts/elements/fullscreen_menu/compact' );
			break;
		default :
			get_template_part(  'parts/elements/fullscreen_menu/standard' );
	}
}
