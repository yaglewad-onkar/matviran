<div class="ohio-counter-box-sc counter-box <?php echo $this->getWrapperClasses(); ?>">

    <?php if ( $settings['block_type_layout'] == 'with_icon' && $settings['icon_position'] == 'top' ): ?>
        <?php $this->showIconInView( $icon_prefix . 'top-icon' ); ?>
    <?php endif; ?>

    <div class="counter-box-count" data-counter="<?php echo $settings['count_number']; ?>">

        <?php if ( $settings['block_type_layout'] == 'with_icon' && $settings['icon_position'] == 'left' ): ?>
            <?php $this->showIconInView( $icon_prefix . 'left-icon' ); ?>
        <?php endif; ?>

        <span class="count" <?php echo $this->getInlineStyleAttr( 'number' ); ?>>0</span><span class="plus-symbol" <?php echo $this->getInlineStyleAttr( 'plus' ); ?>><?php if ( !empty( $settings['plus_symbol'] ) ) { echo "+"; } ?></span>

        <?php if ( $settings['block_type_layout'] == 'with_icon' && $settings['icon_position'] == 'right' ): ?>
            <?php $this->showIconInView( $icon_prefix . 'right-icon' ); ?>
        <?php endif; ?>

    </div>

    <?php // Heading ?>
    <?php if ( !empty( $settings['title'] ) ): ?>
        <h6 class="counter-box-headline heading-sm" <?php echo $this->getInlineStyleAttr( 'heading' ); ?>>
            <?php echo $settings['title']; ?>
        </h6>
    <?php endif; ?>

</div>
