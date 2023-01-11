<div class="ohio-icon-box-sc icon-box <?php echo $this->getWrapperClasses(); ?>" >

    <div class="icon-box-headline">
        <div class="icon-box-icon <?php echo $this->getInlineStyleAttr( 'icon_color' ); ?>">
            <?php $this->showIconInView( 'left-icon' ); ?>
        </div>

        <h5 class="icon-box-title heading-sm" <?php echo $this->getInlineStyleAttr( 'title' ); ?>>
            <?php echo $settings['title']; ?>
        </h5>
    </div>

    <?php if ( !empty( $settings['description'] ) ) : ?>
        <p class="icon-box-details" <?php echo $this->getInlineStyleAttr( 'description' ); ?>>
            <?php echo $settings['description']; ?>
        </p>
    <?php endif; ?>

    <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>
        <a 
            class="btn <?php echo esc_attr( $this->getButtonClasses() ); ?>" 
            <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
            
            <?php echo $settings['button_title']; ?>
            
            <?php if ( $settings['button_style_type'] == 'link' ): ?>
                <i class="ion-right ion"><svg class="arrow-icon" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 7H16M16 7L11 1M16 7L11 13" stroke-width="2"/></svg></i>
            <?php endif; ?>

        </a>
    <?php endif; ?>

</div>
