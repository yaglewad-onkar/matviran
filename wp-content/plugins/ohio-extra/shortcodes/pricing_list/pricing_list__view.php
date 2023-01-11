<?php

/**
* WPBakery Page Builder Ohio Pricing List shortcode view
*/

?>
<div class="ohio-menu-list-sc menu-list<?php echo $css_class; ?>"
	id="<?php echo esc_attr( $menu_list_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
		<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>
	<?php if ( !$appearance_once ) echo ' data-aos-once="true"'; ?>>
	<div class="menu-list-headline">
		<?php if ( $name ): ?>
			<h6 class="menu-list-title heading-sm"><?php echo $name; ?></h6>
		<?php endif; ?>
		<div class="menu-list-price">
			<?php if ( $regular_price && $sale_price ) : ?>
				<span class="discount-price"><?php echo $regular_price; ?></span>
				<span class="regular-price"><?php echo $sale_price; ?></span>
			<?php endif; ?>
			<?php if ( $regular_price && ! $sale_price ) : ?>
				<span class="regular-price"><?php echo $regular_price; ?></span>
			<?php endif; ?>
			<?php if ( ! $regular_price && $sale_price ) : ?>
				<span class="regular-price"><?php echo $sale_price; ?></span>
			<?php endif; ?>
		</div>
	</div>
	<div class="menu-list-details">
		<p>
			<?php if ( $indigriends ) { echo $indigriends; } ?>
		</p>
		<?php if ( $mark ): ?>
		<div class="tag brand-bg-color new"><?php esc_html_e( 'New', 'ohio-extra' ); ?></div>	
		<?php endif; ?>
	</div>
</div>