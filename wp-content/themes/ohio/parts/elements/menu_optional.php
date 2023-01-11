<?php
	$have_woocomerce = function_exists( 'WC' );
	$have_woocomerce_wl = function_exists( 'YITH_WCWL' );
	$have_wpml = function_exists( 'icl_get_languages' );
	$search_position = OhioOptions::get( 'page_header_search_position', 'standard' );
	$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
	$cart_visible = OhioOptions::get_global( 'woocommerce_cart_icon', true );
	$header_style = OhioOptions::get_global( 'page_header_menu_style', 'style1' );
	$header_button = OhioOptions::get_global( 'custom_button_for_header', false );
?>

<?php if (( $have_wpml && $wpml_show_in_header ) || $have_woocomerce || $have_woocomerce_wl || $header_button || $search_position == "standard" ) : ?>
	<ul class="menu-optional">
		<?php if ( $wpml_show_in_header ) : ?>
			<li class="lang-dropdown-holder">
		        <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
			</li>
		<?php endif; ?>
		<?php if ( $header_button ) : ?>
			<li>
				<?php get_template_part( 'parts/elements/menu_button' ); ?>
			</li>
		<?php endif; ?>
		<?php if ( $search_position == "standard" ) : ?>
			<li>
				<?php get_template_part( 'parts/elements/search' );?>
			</li>
		<?php endif; ?>
		<?php if ( $have_woocomerce ) : ?>
			<?php if ( $cart_visible ) : ?>
				<?php if ($have_woocomerce_wl) : ?>
					<li>
						<a class="btn-round btn-round-light dark-mode-reset favorites-global wishlist" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url('user' . '/' . get_current_user_id())); ?>">
							<i class="icon ion ion-md-heart-empty"></i>
						</a>
					</li>
				<?php endif; ?>
			<li>
				<?php get_template_part( 'parts/elements/menu_cart' ); ?>
			</li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
<?php endif; ?>