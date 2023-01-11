<div class="ohio-message-module-sc message-box <?php echo $this->getWrapperClasses(); ?>">
    <?php echo $settings['text']; ?>

    <?php if ( !empty( $settings['use_link'] ) ): ?>
        <a <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
            <?php echo $settings['button_title']; ?>
        </a>
    <?php endif;?>

    <?php if ( empty( $settings['without_close_button'] ) ) : ?>
        <div class="btn-round btn-round-light btn-round-small clb-close">
            <i class="ion ion-md-close"></i>
        </div>
    <?php endif; ?>
</div>
