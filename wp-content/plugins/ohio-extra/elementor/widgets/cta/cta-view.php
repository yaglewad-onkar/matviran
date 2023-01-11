<div class="ohio-cta-sc cta <?php echo $this->getWrapperClasses(); ?>"
    <?php echo $this->getInlineStyleAttr( 'wrapper' ); ?>>
    <div class="cta-details">
        <h3 class="title font-titles">
            <?php echo $settings['title']; ?>
        </h3>
        <?php if ( !empty( $settings['subtitle'] ) ) : ?>
            <p class="subtitle">
                <?php echo $settings['subtitle']; ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="cta-buttons">
        <a class="btn <?php echo esc_attr( $this->getButtonClasses() ); ?>" 
            <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
            
            <?php if ( $settings['icon_position'] == 'left' ): ?>
                <?php $this->showIconInView( 'ion-left' ); ?>
            <?php endif; ?>
            
            <?php if( !empty( $settings['button_title'] ) ): ?>
                <span class="text"><?php echo $settings['button_title']; ?></span>
            <?php endif; ?>

            <?php if ( $settings['icon_position'] == 'right' ): ?>
                <?php $this->showIconInView( 'ion-right' ); ?>
            <?php endif; ?>
        </a>
    </div>
</div>
