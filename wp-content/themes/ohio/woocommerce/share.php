<?php
/**
 * Share template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

/**
 * Template variables:
 *
 * @var $share_title string Title for share section
 * @var $share_facebook_enabled bool Whether to enable FB sharing button
 * @var $share_twitter_enabled bool Whether to enable Twitter sharing button
 * @var $share_pinterest_enabled bool Whether to enable Pintereset sharing button
 * @var $share_email_enabled bool Whether to enable Email sharing button
 * @var $share_whatsapp_enabled bool Whether to enable WhatsApp sharing button (mobile online)
 * @var $share_url_enabled bool Whether to enable share via url
 * @var $share_link_title string Title to use for post (where applicable)
 * @var $share_link_url string Url to share
 * @var $share_summary string Summary to use for sharing on social media
 * @var $share_image_url string Image to use for sharing on social media
 * @var $share_twitter_summary string Summary to use for sharing on Twitter
 * @var $share_facebook_icon string Icon for facebook sharing button
 * @var $share_twitter_icon string Icon for twitter sharing button
 * @var $share_pinterest_icon string Icon for pinterest sharing button
 * @var $share_email_icon string Icon for email sharing button
 * @var $share_whatsapp_icon string Icon for whatsapp sharing button
 * @var $share_whatsapp_url string Sharing url on whatsapp
 */

if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly
?>

<?php do_action( 'yith_wcwl_before_wishlist_share', $wishlist); ?>

<div class="yith-wcwl-share">
    <h4 class="heading-md">
        <?php echo wp_kses( $share_title, 'default' ); ?>
    </h4>
    <ul class="socialbar small">
        <?php if( $share_facebook_enabled ): ?>
            <li class="share-button">
                <a target="_blank" class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode($share_link_url)?>&p[title]=<?php echo $share_link_title ?>" title="<?php _e( 'Facebook', 'ohio' ) ?>">
                    <?php echo $share_facebook_icon ? '<i class="fab fa-facebook-f"></i>' : __( 'Facebook', 'ohio' ) ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_twitter_enabled ): ?>
            <li class="share-button">
                <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo urlencode( $share_link_url ) ?>&amp;text=<?php echo $share_twitter_summary ?>" title="<?php _e( 'Twitter', 'ohio' ) ?>">
	                <?php echo $share_twitter_icon ? '<i class="fab fa-twitter"></i>' : __( 'Twitter', 'ohio' ) ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_pinterest_enabled ): ?>
            <li class="share-button">
                <a target="_blank" class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( $share_link_url ) ?>&amp;description=<?php echo $share_summary ?>&amp;media=<?php echo $share_image_url ?>" title="<?php _e( 'Pinterest', 'ohio' ) ?>" onclick="window.open(this.href); return false;">
	                <?php echo $share_pinterest_icon ? '<i class="fab fa-pinterest"></i>' : __( 'Pinterest', 'ohio' ) ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_email_enabled ): ?>
            <li class="share-button">
                <a class="email" href="mailto:?subject=<?php echo urlencode( apply_filters( 'yith_wcwl_email_share_subject', $share_link_title ) )?>&amp;body=<?php echo apply_filters( 'yith_wcwl_email_share_body', urlencode( $share_link_url ) ) ?>&amp;title=<?php echo $share_link_title ?>" title="<?php _e( 'Email', 'ohio' ) ?>">
	                <?php echo $share_email_icon ? '<i class="fa fa-envelope"></i>' : __( 'Email', 'ohio' ) ?>
                </a>
            </li>
        <?php endif; ?>

        <?php if( $share_whatsapp_enabled ):
            ?>
            <li class="share-button">
                <a class="whatsapp" href="<?php echo $share_whatsapp_url ?>" data-action="share/whatsapp/share" target="_blank" title="<?php _e( 'WhatsApp', 'ohio' ) ?>">
	                <?php echo $share_whatsapp_icon ? '<i class="fab fa-whatsapp"></i>' : __( 'Whatsapp', 'ohio' ) ?>
                </a>
            </li>
        <?php endif;
        ?>
    </ul>

    <?php if( $share_url_enabled ): ?>
        <div class="yith-wcwl-after-share-section">
            <input class="copy-target" readonly="readonly" type="url" name="yith_wcwl_share_url" id="yith_wcwl_share_url" value="<?php echo $share_link_url ?>"/>
            <?php echo ( ! empty( $share_link_url ) ) ? sprintf( '<small>%s <span class="copy-trigger">%s</span> %s</small>', __( '(Now', 'ohio' ), __( 'copy', 'ohio' ), __( 'this wishlist link and share it anywhere)', 'ohio' ) ) : '' ?>
        </div>
    <?php endif; ?>

	<?php do_action( 'yith_wcwl_after_share_buttons', $share_link_url, $share_title, $share_link_title ) ?>
</div>

<?php do_action( 'yith_wcwl_after_wishlist_share', $wishlist ); ?>