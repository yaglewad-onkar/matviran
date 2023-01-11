<?php

/**
* WPBakery Page Builder Ohio Gallery shortcode view
*/

?>
<div class="ohio-gallery-sc clb-gallery <?php echo $gallery_class . $css_class; ?>"
	id="<?php echo esc_attr( $images_uniqid ); ?>"
	data-gallery="<?php echo esc_attr( $gallery_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . $appearance_effect . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . intval( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>

	<?php 
		if (is_front_page()) {
			$pagination_page = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$pagination_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		$items_per_page = intval( $pagination_items_per_page );
		
		$_image_start = 0;
		$_image_end = count( $gallery );
		$_gallery_item = 0;

		if ( $use_pagination ) {
			$_image_start = $_gallery_item = $pagination_page * $items_per_page - $items_per_page;
			$_image_end = count( $gallery );

			if ( $pagination_type == 'simple' || $pagination_type == 'standard') {
				$_gallery_item = 0;
			}

			if ( $_image_end > $_image_start + $items_per_page ) {
				$_image_end = $_image_start + $items_per_page;
			}
		}

	?>

	<div class="vc_row<?php if ( $masonry_grid ) { echo ' ohio-masonry'; } ?>" data-lazy-container="gallery">
	<?php for ( $_image_i = $_image_start; $_image_i < $_image_end; $_image_i++, $_gallery_item++ ) : ?>
	<?php $image = $gallery[ $_image_i ]; ?>
	<div class="<?php echo $column_class; ?> masonry-block grid-item gallery-image cursor-as-pointer" data-cursor-class="cursor-link" data-gallery-item="<?php echo $_gallery_item; ?>" data-lazy-item="" data-lazy-scope="gallery">
		<div class="grid-item-container">
			<?php if ( $metro_style ) : ?>
				<figure class="grid-item-image" data-ohio-bg-image="<?php echo $image['full']; ?>">
					<img class="gimg hidden-image" src="<?php echo ($image['full']) ? $image['full'] : '#'; ?>" alt="<?php echo ( $image['alt']) ?  $image['alt'] : 'Alt'; ?>">
				</figure>

			<?php else: ?>
			<div class="grid-image-holder">
				<img class="gimg hidden-image" src="<?php echo ($image['full']) ? $image['full'] : '#'; ?>" alt="<?php echo ($image['alt']) ?  $image['alt'] : 'Alt'; ?>">
			</div>
			<?php endif; ?>
			<div class="grid-item-overlay overlay<?php echo $overlay_class; ?>"></div>
			<?php if ( $show_title ) : ?>
				<div class="clb-gallery-img-details">
					<h5 class="title"><?php echo esc_html($image['title']); ?></h5>
					<p class="caption"><?php echo esc_html($image['caption']); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endfor; ?>
	</div>

	<?php 
		if ( $use_pagination ) {

			$pages_count = ceil( count( $gallery ) / $items_per_page );

			if ( $pagination_type == 'simple' ) {

				OhioLayout::the_paginator_layout( $pagination_page, $pages_count );

			} else if ( $pagination_type == 'standard' ) {

				echo '<div class="pagination-standard">';
				OhioLayout::the_paginator_layout( $pagination_page, $pages_count );
				echo '</div>';

			} else if ( $pagination_type == 'lazy_scroll' ) {

				echo '<div class="lazy-load loading font-titles" data-lazy-load="scroll" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="gallery">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '<span class="icon ion-refresh"></span>';
				echo '</div>';

			}  else if ( $pagination_type == 'lazy_button' ) {

				echo '<div class="lazy-load load-more font-titles" data-lazy-load="click" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="gallery">';
				echo '<span class="btn-round btn-round-light" tabindex="0"><i class="ion ion-md-sync"></i></span>';
				echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
				echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
				echo '<span class="icon ion-refresh"></span>';
				echo '</div>';

			}
		}
	?>

</div>

<div class="ohio-gallery-opened-sc clb-popup clb-gallery-lightbox<?php echo $css_class; ?>" 
	id="<?php echo esc_attr( $gallery_uniqid ); ?>" 
	data-options='<?php echo $gallery_json; ?>'>
	<div class="close close-bar">
	    <div class="clb-close btn-round round-animation circle-animation">
	        <i class="ion ion-md-close"></i>
	    </div>
	    <div class="expand btn-round round-animation circle-animation vc_hidden-xs">
	        <i class="ion ion-md-expand"></i>
	    </div>
	</div>
    <div class="clb-popup-holder"></div>
</div>