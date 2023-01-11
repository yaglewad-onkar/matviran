<div class="ohio-button-sc btn-wrap <?php echo $this->getWrapperClasses(); ?>">

    <a
        class="btn <?php echo implode( ' ', $button_classes ); ?>"
        <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>

        <?php if ( $settings['use_icon'] && $settings['icon_position'] == 'left' ): ?>
            <?php $this->showIconInView( 'ion-left' ); ?>
        <?php endif; ?>

        <span class="text" <?php echo $this->getInlineStyleAttr( 'label' ); ?>>
            <?php echo $settings['title']; ?>
        </span>

        <?php if ( $settings['use_icon'] && $settings['icon_position'] == 'right' ): ?>
            <?php $this->showIconInView( 'ion-right' ); ?>
        <?php endif; ?>

    </a>

</div>
