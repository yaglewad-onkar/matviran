<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$action = get_permalink( wc_get_page_id('shop') );
$current_term = 0;
if (is_tax('product_cat')) {
    $current_term = get_queried_object_id();
    $action = get_term_link($current_term, 'product_cat');
}
?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url($action) ?>">

	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for', 'ohio' ) . ':'; ?></span>
		<input autocomplete="off" type="text" class="search-field" name="s" placeholder="<?php esc_attr_e( 'Search...', 'ohio' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
		<?php
		$names = get_terms('product_cat', 'fields=id=>name');
		?>
	</label>

	<select name="search_term">
		<option value=""><?php esc_html_e( 'Select Category', 'ohio' ); ?></option>
		<?php foreach ($names as $id => $name) { ?>
			<option value="<?php echo esc_attr( $id ) ?>"<?php echo selected($id, $current_term) ?>><?php echo esc_attr( $name ) ?></option>
		<?php } ?>
	</select>

	<button type="submit" class="search search-submit" ><i class="ion ion-md-search"></i></button>
</form>

<div class="search_results"></div>