<?php

if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
    return;
}

if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {

    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'bklyn-sidenav',
        'fallback_cb'       => 'ut_default_menu',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'             => 3,
        'walker'            => new ut_menu_walker() 
    );

} else {
    
    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'bklyn-sidenav',
        'fallback_cb'       => 'ut_default_menu',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'             => 3,
    );

}

?>

<?php 

if( has_nav_menu( 'side' ) ) {
    
    $menu['theme_location'] = 'side';
    echo wp_nav_menu( $menu ); 

} elseif( has_nav_menu( 'primary' ) ) {
    
    $menu['theme_location'] = 'primary';
    echo wp_nav_menu( $menu );
    
} ?>