<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

    if ( isset($_GET['popup']) && $_GET['popup'] == true ) {
        get_template_part( '/woocommerce/product_popup.php' );
        return;
    }


	OhioHelper::add_required_script( 'accordion' );
	OhioHelper::add_required_script( 'tabs' );

	$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

	get_header( 'shop' );

	$page_container_class = '';
	if ( !$page_wrapped ) {
		$page_container_class .= ' full';
	}

	$header_menu_style = OhioOptions::get( 'page_header_menu_style', 'style1' );
	$header_classes = '';
	if ( $header_menu_style == 'style6' || $header_menu_style == 'style7') {
		$header_classes .= ' sticky_product_position';
	}
	
	$sticky_header = OhioOptions::get( 'page_header_menu_fixed', true );
	$sub_header = OhioOptions::get( 'page_subheader_visibility', true );
	$header_spacer = OhioOptions::get( 'page_header_add_cap', false );
?>

<div class="woo_c-product single-product <?php echo esc_attr( !$sub_header ? 'subheader_excluded' : 'subheader_included' );?> <?php echo esc_attr( $header_spacer ? 'spacer_included' : 'spacer_excluded' );?> <?php echo esc_attr( $sticky_header ? 'sticky_included' : 'sticky_excluded' ); ?> <?php echo esc_attr( $header_classes ); ?>">
	<?php
		while ( have_posts() ) {
			the_post();
			wc_get_template_part( 'content', 'single-product' );
		}
		do_action( 'woocommerce_after_main_content' );
	?>
    <?php get_template_part( 'parts/elements/nav_products' ); ?>
</div>
<?php get_footer( 'shop' );?>