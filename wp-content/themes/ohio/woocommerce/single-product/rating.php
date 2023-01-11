<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

//	Rating moved to title.php

// Rating
if ( get_option( 'woocommerce_enable_review_rating' ) != 'no' ) {
	$rating_count = $product->get_rating_count();
	$review_count = $product->get_review_count();
	$average      = $product->get_average_rating();

	if ( $rating_count > 0 ) : ?>

		<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
			<div class="star-rating" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'ohio' ), $average ); ?>">
				<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
					<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'ohio' ), '<span itemprop="bestRating">', '</span>' ); ?>
					<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'ohio' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
				</span>
			</div>
			<span class="average"><?php echo esc_html( $average ); ?></span>
			<!-- Link on reviews -->
			<?php if ( comments_open() ) : ?>
				<a href= "#product_review" class="woo-review-link" rel="nofollow">
				<?php
					printf( _n( '%s', '%s', $review_count, 'ohio' ), '<span itemprop="reviewCount" class="count">(' . $review_count . ')</span>' );
				?>
				</a>
			<?php endif ?>

			<a href="#product_review" class="write-review"><?php esc_attr_e( 'Write a review', 'ohio' ); ?></a>
		</div>
		

	<?php endif;
}

?>
