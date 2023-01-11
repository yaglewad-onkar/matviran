<!DOCTYPE html>
<html <?php language_attributes(); ?> class="ut-no-js">
<!--
##########################################################################################

BROOKLYN THEME BY UNITED THEMES™

DESIGNED BY MARCEL MOERKENS
DEVELOPED BY MARCEL MOERKENS & MATTHIAS NETTEKOVEN 

© 2011-<?php echo date("Y"); ?> BROOKLYN THEME
POWERED BY UNITED THEMES™ 
ALL RIGHTS RESERVED

UNITED THEMES™  
WEB DEVELOPMENT FORGE EST.2011
WWW.UNITEDTHEMES.COM

Version: <?php echo _ut_get_theme_version(); ?>

##########################################################################################
-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <?php ut_meta_hook(); //action hook, see inc/ut-theme-hooks.php ?>

    <?php if( defined('WPSEO_VERSION') || defined('SEOPRESS_VERSION') || defined('AIOSEOPPRO') || ot_get_option( 'ut_deactivate_theme_seo' , 'off' ) == 'on' ) : ?>

    <?php else : ?>

        <?php ut_meta_theme_hook(); ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php endif; ?>
    
    <!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Favicon -->
	<?php if( ot_get_option( 'ut_favicon' ) ) : ?>
        
        <?php 
        
        /* get icon info */
        $favicon = ot_get_option( 'ut_favicon' );
        $favicon_info = pathinfo( $favicon ); 
        $type = NULL;
        
        if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
            $type = 'type="image/png"';
        }
        
        if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
            $type = 'type="image/x-icon"';
        }
        
        if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
            $type = 'type="image/gif"';
        }
        
        ?>
                
        <link rel="shortcut&#x20;icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        <link rel="icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />

    <?php else : ?>

        <link rel="shortcut&#x20;icon" href="<?php echo THEME_WEB_ROOT . '/images/default/fav-32.png' ; ?>" type="image/png" />
        <link rel="icon" href="<?php echo THEME_WEB_ROOT . '/images/default/fav-32.png'; ?>" type="image/png" />

    <?php endif; ?>

    <!-- Apple Touch Icons -->
    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone' ) ) :?>
    <link rel="apple-touch-icon" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone' ); ?>">
    <?php endif; ?>

    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad' ) ) : ?>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad' ); ?>" />
    <?php endif; ?>

    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone_retina' ) ) : ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone_retina' ); ?>" />
    <?php endif; ?>

    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad_retina' ) ) :?>
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad_retina' ); ?>" />
    <?php endif; ?>

    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

    <?php ut_before_wp_head_hook(); //action hook, see inc/ut-theme-hooks.php ?>

    <?php wp_head(); ?>

    <?php ut_after_wp_head_hook(); //action hook, see inc/ut-theme-hooks.php ?>
    
</head>

<body id="ut-sitebody" <?php body_class('ut-hover-cursor-parent'); ?> data-scrolleffect="<?php echo ut_scroll_effect(); ?>" data-scrollspeed="<?php echo ot_get_option( 'ut_scrollto_speed', '1300' ); ?>">

<?php wp_body_open(); ?>

<?php ut_before_top_header_hook(); ?> 
    
<?php get_template_part( 'partials/header/header', 'side' );  ?>

<a class="ut-offset-anchor" id="top" style="top:0px !important;"></a>

<?php get_template_part( 'partials/top', 'header' ); // only for side navigation ?>
    
<?php ut_before_header_hook(); ?> 
    
<?php get_template_part( 'partials/header/header', apply_filters( 'unite_header_layout', 'default' ) );	?>

<div class="clear"></div>

<?php get_template_part( 'template-part', 'hero' ); ?>       

<?php ut_before_content_hook(); // action hook, see inc/ut-theme-hooks.php ?>

<div id="main-content" class="wrap ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small">
	
    <a class="ut-offset-anchor" id="to-main-content"></a>
		
        <div class="main-content-background clearfix">