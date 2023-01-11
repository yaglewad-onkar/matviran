<?php
    $expires = OhioOptions::get_global( 'subscribe_popup_expires' );
    setcookie( 'subscribeCookie', "enabled", ( time() + 60 * 60 * 24 * $expires ), '/' );

    $heading = OhioOptions::get_global( 'text_subcribe_popup' );
    $description = OhioOptions::get_global( 'details_text_subcribe_popup' );
    $form_id = OhioOptions::get_global( 'subscribe_choice_of_forms' );
?>

<div class="clb-subscribe">
    <div class="vc_row">
        <div class="clb-subscribe-img vc_col-sm-6 vc_col-xs-12"></div>
        <div class="clb-subscribe-content text-center vc_col-sm-6 vc_col-xs-12">
            <h4 class="clb-subscribe-content-headline"><?php echo esc_html( $heading ) ?></h4>
            <div class="subscribe-content-subheader">
                <p><?php echo esc_html( $description ) ?></p>
            </div>
            <div class="contact-form">
                <?php if ($form_id): ?>
                    <?php echo do_shortcode('[contact-form-7 id="' . esc_attr( $form_id ) . '"]') ?>
                    <div class="hidden" data-contact-btn="true">
                        <button class="btn btn-subscribe">
                            <span class="btn-load"></span>
                            <span class="text"></span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <a href="#" class="subscribe-nothanks-btn btn btn-link"><?php esc_html_e('No, thanks', 'ohio'); ?></a>
        </div>
    </div>
</div>