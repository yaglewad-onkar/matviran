<?php

function ohio_vc_set_as_theme() {
	vc_set_default_editor_post_types( array(
		'page',
		'post',
		'custom_post_type',
		'ohio_portfolio'
	) );
	vc_set_as_theme();
}

add_action( 'vc_before_init', 'ohio_vc_set_as_theme' );

/*
function ohio_vc_remove_frontend_links() {
    vc_disable_frontend(); // this will disable frontend editor
}

add_action( 'vc_after_init', 'ohio_vc_remove_frontend_links' );


function ohio_vc_remove_wp_admin_bar_button() {
    remove_action( 'admin_bar_menu', array( vc_frontend_editor(), 'adminBarEditLink' ), 1000 );
}

add_action( 'vc_after_init', 'ohio_vc_remove_wp_admin_bar_button' );
*/