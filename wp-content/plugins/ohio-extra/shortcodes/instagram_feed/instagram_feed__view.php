<?php

/**
* WPBakery Page Builder Ohio Instagram Feed shortcode view
*/

?>
<div class="ohio-instagram-feed-sc instagram-feed vc_row<?php echo esc_attr($css_class) ?>"
	id="<?php echo esc_attr( $instagram_feed_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>>
	<?php
		if( isset( $result ) ) :
			$_counter = 0;
			foreach ( $result as $post ) : ?>
				<?php $thumbnail = end( $post['node']['thumbnail_resources'] ); ?>

				<?php $_counter++; ?>
				<?php if ( $_counter > $photo_count ) break; ?>

					<div class="instagram-feed-column vc_col-md-<?php echo $column; ?> vc_col-xs-6">
						<?php if ( $card_type == 'original' ) : ?>
							<a class="original" target="_blank" href="<?php echo esc_url( 'https://www.instagram.com/p/' . $post['node']['shortcode'] . '/?taken-by=' . $username ); ?>">
								<img src="<?php echo esc_attr( $thumbnail['src'] ) ?>" alt=""/>
								<div class="btn-round" tabindex="0">
									<i class="ion ion-md-add"></i>
								</div>
							</a>
						<?php else : ?>
							<a class="cropped" target="_blank" href="<?php echo esc_url( 'https://www.instagram.com/p/' . $post['node']['shortcode'] . '/?taken-by=' . $username ); ?>">
								<figure style="background-image:url('<?php echo esc_url( $thumbnail['src'] ) ?>');"></figure>
								<div class="btn-round" tabindex="0">
									<i class="ion ion-md-add"></i>
								</div>
							</a>
						<?php endif; ?>
					</div>
			<?php endforeach;
		endif;
	?>
</div>