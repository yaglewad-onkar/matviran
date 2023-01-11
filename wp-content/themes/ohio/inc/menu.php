<?php
/*
* Custom Walker to remove all the wp_nav_menu junk
*/
class crum_clean_walker extends Walker_Nav_Menu
{
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$current_indicators = array( 'current-menu-parent', 'current_page_item', 'current_page_parent' );

		$newClasses = array();

		foreach( $classes as $el ){
			if ( in_array( $el, $current_indicators ) ){
				array_push( $newClasses, $el );
			}
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $newClasses ), $item ) );
		if( $class_names != '' ) $class_names = ' class="'. esc_attr( $class_names ) . '"';


		$output .= $indent . '<li' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 *	Mega Menu 
 */
if ( ! defined( 'STOCKIE_MEGA_MENU_CLASS' ) ) define( 'STOCKIE_MEGA_MENU_CLASS', 'Ohio_Mega_Menu' );
if ( ! defined( 'STOCKIE_EDIT_MENU_WALKER_CLASS' ) ) define( 'STOCKIE_EDIT_MENU_WALKER_CLASS', 'Ohio_Edit_Menu_Walker' );
if ( ! defined( 'STOCKIE_NAV_MENU_WALKER_CLASS' ) ) define( 'STOCKIE_NAV_MENU_WALKER_CLASS', 'Ohio_Nav_Menu_Walker' );
if ( ! function_exists( 'ohio_mega_menu_init' ) ) {

	function ohio_mega_menu_init() {
		require_once get_template_directory() . '/inc/menu/edit_mega_menu_walker.php';
		require_once get_template_directory() . '/inc/menu/front_mega_menu_walker.php';
		require_once get_template_directory() . '/inc/menu/mega_menu.php';
		$class = STOCKIE_MEGA_MENU_CLASS;
		$mega_menu = new $class();
	}
	
}

add_action( 'after_setup_theme', 'ohio_mega_menu_init' );

if ( ! function_exists( 'ohio_mega_menu_walker' ) ) {

	function ohio_mega_menu_walker( $args = '' ) {
		$metro_menu_walker['container'] = false;

		if ( !$args['walker'] ) {
			$class = STOCKIE_NAV_MENU_WALKER_CLASS;
			$metro_menu_walker['walker'] = new $class();
		}

		return array_merge( $args, $metro_menu_walker );
	}

}

add_filter( 'wp_nav_menu_args', 'ohio_mega_menu_walker' );

function ohio_megamenu_remove_hoverintent_delay( $array ) {
	$array['interval'] = 0;
	$array['timeout'] = 0;

	return $array;
}

add_filter( 'megamenu_javascript_localisation', 'ohio_megamenu_remove_hoverintent_delay', 10, 1 );