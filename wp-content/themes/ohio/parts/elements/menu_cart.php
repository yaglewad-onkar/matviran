<?php
	$show_sum = OhioOptions::get( 'page_header_cart_sum_visibility', true );
?>
<div class="cart-holder">
	<?php if ( $show_sum  ): ?>
		<span class="cart-total">
			<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"><?php echo WC()->cart->get_total(); ?></a>
		</span>
	<?php endif; ?>
	<a href="#" class="cart btn-round btn-round-light dark-mode-reset">
		<i class="icon ion">
			<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 12 16" xml:space="preserve">
			<path class="st0" d="M9,4V3c0-1.7-1.3-3-3-3S3,1.3,3,3v1H0v10c0,1.1,0.9,2,2,2h8c1.1,0,2-0.9,2-2V4H9z M4,3c0-1.1,0.9-2,2-2
				s2,0.9,2,2v1H4V3z"/>
			</svg>
		    <span class="cart-counter brand-bg-color"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		</i>
	</a>
	<div class="submenu_cart">
		<div class="cart_header">
			<div class="cart_heading">
				<h6 class="cart_heading_title"><?php esc_html_e( 'Cart review', 'ohio' ); ?></h6>
			</div>
			<div id="close_cart" class="btn-round btn-round-light btn-round-small clb-close dark-mode-reset" tabindex="0">
				<i class="ion ion-md-close"></i>	
			</div>
		</div>
		<div class="widget_shopping_cart_content">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
</div>