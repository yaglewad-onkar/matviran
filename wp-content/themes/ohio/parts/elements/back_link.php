<?php
// GLOBALS
$previous_btn_text = OhioOptions::get( 'page_header_previous_button_text', esc_html__( 'Back', 'ohio' ), null, true );
?>

<div class="clb-back-link vc_hidden-md vc_hidden-sm vc_hidden-xs">
    <a href="<?php echo wp_get_referer(); ?>" class="btn-round btn-round-light">
        <i class="ion-left ion"><svg class="arrow-icon arrow-icon-back" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 8H15M15 8L8.5 1.5M15 8L8.5 14.5" stroke-width="2" stroke-linejoin="round"/></svg></i>
    </a>
    <span class="clb-back-link-caption">
        <?php echo esc_html($previous_btn_text) ?>
    </span>
</div>