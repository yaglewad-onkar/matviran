<div class="ohio-gallery-sc clb-gallery gallery-wrap <?php echo $this->getWrapperClasses(); ?>"
	data-gallery="<?php echo esc_attr( $gallery_uniqid ); ?>">

	<?php
		$_image_start = 0;
		$_image_end = count( $settings['images'] );
		$_gallery_item = 0;

		if ( !empty( $settings['use_pagination'] ) ) {
			$_image_start = $_gallery_item = $pagination_page * $items_per_page - $items_per_page;

			if ( in_array( $settings['pagination_type'], [ 'simple', 'standard' ] ) ) {
				$_gallery_item = 0;
			}

			if ( $_image_end > $_image_start + $items_per_page ) {
				$_image_end = $_image_start + $items_per_page;
			}
		}
	?>

	<div class="vc_row <?php if ( !empty( $settings['masonry_grid'] ) ) { echo 'ohio-masonry'; } ?>" data-lazy-container="gallery">
	<?php for ( $_image_i = $_image_start; $_image_i < $_image_end; $_image_i++, $_gallery_item++ ) : ?>

		<?php $image = $settings['images'][ $_image_i ]; ?>
		<div class="<?php echo implode( ' ', $column_class ); ?> masonry-block grid-item gallery-image cursor-as-pointer" 
			data-cursor-class="cursor-link" 
			data-gallery-item="<?php echo $_gallery_item; ?>" 
			data-lazy-item="" 
			data-lazy-scope="gallery">

			<div class="grid-item-container">
				<?php if ( empty( $settings['metro_style'] ) ) : ?>
					<div class="grid-image-holder">
						<img class="gimg hidden-image" src="<?php echo ( $image['url'] ) ? $image['url'] : '#'; ?>">
					</div>
				<?php else: ?>
					<figure class="grid-item-image" data-ohio-bg-image="<?php echo $image['url']; ?>">
						<img class="gimg hidden-image" src="<?php echo ( $image['url'] ) ? $image['url'] : '#'; ?>">
					</figure>
				<?php endif; ?>

				<div class="grid-item-overlay overlay <?php echo implode( ' ', $overlay_class ); ?>"></div>

				<?php if ( !empty( $settings['preview_title'] ) ) : ?>
					<div class="clb-gallery-img-details">
						<h5 class="title"><?php echo esc_html( get_the_title( $image['id'] ) ); ?></h5>
						<p class="caption"><?php echo esc_html( wp_get_attachment_caption( $image['id'] ) ); ?></p>
					</div>
				<?php endif; ?>
			</div>

		</div>

	<?php endfor; ?>
	</div>

	<?php require 'views/pagination.php'; ?>
</div>

<?php require 'views/popup.php'; ?>
