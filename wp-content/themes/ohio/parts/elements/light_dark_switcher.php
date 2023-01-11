<?php 
    $switcher = OhioOptions::get( 'page_dark_mode_switcher', false );
    $mobile_switcher = OhioOptions::get( 'page_dark_mode_switcher_mobile', false );

    $additional_class = '';
    if ( !$mobile_switcher ) {
        $additional_class .= ' vc_hidden-xs';
    } 
?>

<?php if ($switcher) :  ?>
    <div class="clb-mode-switcher cursor-as-pointer vc_hidden-md vc_hidden-sm <?php echo esc_attr( $additional_class ); ?>">
        <div class="clb-mode-switcher-item dark"><p class="clb-mode-switcher-item-state"><?php esc_html_e( 'Dark', 'ohio' ); ?></p></div>
        <div class="clb-mode-switcher-item light"><p class="clb-mode-switcher-item-state"><?php esc_html_e( 'Light', 'ohio' ); ?></p></div>
        <div class="clb-mode-switcher-toddler">
            <div class="clb-mode-switcher-toddler-wrap">
                <div class="clb-mode-switcher-toddler-item dark"><p class="clb-mode-switcher-item-state"><?php esc_html_e( 'Dark', 'ohio' ); ?></p></div>
                <div class="clb-mode-switcher-toddler-item light"><p class="clb-mode-switcher-item-state"><?php esc_html_e( 'Light', 'ohio' ); ?></p></div>
            </div>
        </div>
     </div>
 <?php endif; ?>