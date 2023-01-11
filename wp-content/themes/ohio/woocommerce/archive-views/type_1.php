<?php

global $post;
$shop_page_id = wc_get_page_id( 'shop' );

if ( $post && is_object( $post ) ) {
    $postID = $post->ID;
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        $post->ID = get_option( 'woocommerce_shop_page_id' ); // woocomerce wrong post id fix
    }
}

$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );

$page_container_class = '';

if ( !$page_wrapped ) {
    $page_container_class .= ' full';
}
if( $add_content_padding && !$show_breadcrumbs ) {
	$page_container_class .= ' top-offset';
}

$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );
$sidebar_page_class = '';
if ( is_active_sidebar( 'wc_shop' ) ) {
    if ( $sidebar_position == 'left' ) {
        $sidebar_page_class = ' with-left-sidebar';
    } elseif ( $sidebar_position == 'right' ) {
        $sidebar_page_class = ' with-right-sidebar';
    }
}
$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'simple' );
$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' sidebar-' . $sidebar_layout;
}

$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );
if ( is_string( $products_in_row ) ) {
    $products_in_row = json_decode( $products_in_row );
}

if( $products_in_row == NULL ){
    $products_in_row = (object) array(
        "large" => "3",
        "medium" => "2",
        "small" => "2"
    );
}

$product_now = 0;

$row_class = '';
if ( is_object( $products_in_row ) ) {
    $row_class = ' columns-' . $products_in_row->large;
    $row_class .= ' columns-md-' . $products_in_row->medium;
    $row_class .= ' columns-sm-' . $products_in_row->small;
}

get_header( 'shop' );
get_template_part( 'parts/elements/page_headline' );
get_template_part( 'parts/elements/breadcrumbs' );
do_action( 'woocommerce_before_main_content' );

$content_location = OhioOptions::get_global( 'shop_content_position', 'top' );
?>

<div class="page-container<?php echo esc_attr( $page_container_class ); ?> woo-shop-container bottom-offset product shop-product-type_1">
    <!-- Custom content -->
	<?php if ($content_location == 'top'): ?>
        <div class="page_content shop_page_content">
	        <?php do_action( 'woocommerce_archive_description' ); ?>
        </div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'wc_shop' ) && $sidebar_position == 'left'  ) : ?>
	<div class="page-sidebar sidebar-left woo-sidebar<?php echo esc_attr( $sidebar_class ); ?>">
		<ul class="sidebar-widgets">
			<?php dynamic_sidebar( 'wc_shop' ); ?>
		</ul>
	</div>
	<?php endif; ?>
	<div class="page-content<?php echo esc_attr( $sidebar_page_class ); ?><?php echo esc_attr( $row_class ); ?>">

		<?php if ( have_posts() ) : ?>
		<?php
			wc_print_notices();

			if ( is_shop() || is_product_category() || is_product_tag() ) {
				$post->ID = $postID;
			}
			?>
			<?php
			woocommerce_product_loop_start();
			woocommerce_product_subcategories();

            global $iteration;
			while ( have_posts() ) {
				the_post();
                $iteration++;
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'grid', 'product' );
			}

			woocommerce_product_loop_end();
			do_action( 'woocommerce_after_shop_loop' );
		?>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		<?php endif; ?>

        <?php if ($content_location == 'bottom'): ?>
            <div class="page_content shop_page_content">
                <?php do_action( 'woocommerce_archive_description' ); ?>
            </div>
        <?php endif; ?>

	</div>
	<?php if ( is_active_sidebar( 'wc_shop' ) && $sidebar_position == 'right'  ) : ?>
	<div class="page-sidebar sidebar-right woo-sidebar<?php echo esc_attr( $sidebar_class ); ?>">
		<ul class="sidebar-widgets">
			<?php dynamic_sidebar( 'wc_shop' ); ?>
		</ul>
	</div>
	<?php endif; ?>
</div>

<!--.page-container-->
<?php do_action( 'woocommerce_after_main_content' );?>