<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! $notices ) {
	return;
}

?>
<div class="woo_c-message-group">
	<?php foreach ( $notices as $notice ) : ?>
		<div class="message-box primary woo-message-box">
			<?php echo wc_kses_notice( $notice['notice'] ); ?>
			<div class="btn-round btn-round-small btn-round-light clb-close" tabindex="0">
	            <i class="ion ion-md-close"></i>
	        </div>
		</div>
	<?php endforeach; ?>
</div>