<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
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
 * @version     3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$total = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );

if ( $total <= 1 ) {
	return;
}

// Pagination
$pagination_type = OhioOptions::get( 'pagination_type', 'simple' );
$pagination_position = OhioOptions::get( 'pagination_position', 'left' );
?>
<nav class="pagination text-<?php echo esc_attr( $pagination_position ); ?>">
	<?php
		$large_number = 10000000;
		$paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );
		$paginator_pattern .= ( parse_url( $paginator_pattern, PHP_URL_QUERY ) ? '&' : '?') . 'ohio_of=dynamic_css,header,footer,headline,breadcrumbs';

		switch ( $pagination_type ) {
			case 'simple':
				$paginate = paginate_links( apply_filters( 'woocommerce_pagination_args', array(
					'base'         => esc_url_raw( str_replace( $large_number, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( $large_number, false ) ) ) ),
					'format'       => '',
					'add_args'     => false,
					'current'      => max( 1, $current ),
					'total'        => $total,
					'prev_text'    => '<span class="btn btn-link"><i class="ion-left ion ion-md-arrow-back"></i> ' . esc_html__( 'Prev', 'ohio' ) . '</span>',
					'next_text'    => '<span class="btn btn-link">' . esc_html__( 'Next', 'ohio' ) . '  <i class="ion-right ion ion-md-arrow-forward"></i></span>',
					'type'         => 'list',
					'end_size'     => 3,
					'mid_size'     => 3,
				) ) );


				$paginate = str_replace( '<a class="', '<a class=" ', $paginate );
				echo str_replace( '<a class=\'', '<a class=\' ', $paginate );
				break;

			case 'standard':
				echo '<div class="pagination-standard">';
				$paginate = paginate_links( apply_filters( 'woocommerce_pagination_args', array(
					'base'         => esc_url_raw( str_replace( $large_number, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( $large_number, false ) ) ) ),
					'format'       => '',
					'add_args'     => false,
					'current'      => max( 1, $current ),
					'total'        => $total,
					'prev_text'    => '<span class="btn btn-link"><i class="ion-left ion ion-md-arrow-back"></i> ' . esc_html__( 'Prev', 'ohio' ) . '</span>',
					'next_text'    => '<span class="btn btn-link">' . esc_html__( 'Next', 'ohio' ) . '  <i class="ion-right ion ion-md-arrow-forward"></i></span>',
					'type'         => 'list',
					'end_size'     => 3,
					'mid_size'     => 3,
				) ) );

				$paginate = str_replace( '<a class="', '<a class=" ', $paginate );
				echo str_replace( '<a class=\'', '<a class=\' ', $paginate );
				echo '</div>';
				break;

		 	case 'lazy_scroll':
				echo '<div class="lazy-load loading font-titles text-' . $pagination_position . '" data-lazy-load="scroll" data-lazy-pages-count="' . esc_attr( $total) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="products">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
				echo '</div>';
				break;
			case 'lazy_button':
				echo '<div class="lazy-load load-more font-titles text-' . $pagination_position . '" data-lazy-load="click" data-lazy-pages-count="' . esc_attr( $total ) . '" data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" data-lazy-load-scope="products">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio' ) . '</span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio' ) . '</span>';
				echo '</div>';
				break;
		}

	?>
</nav>