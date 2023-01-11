<div class="ohio-heading-sc heading <?php echo $this->getWrapperClasses(); ?>">

    <?php // Subtitle before title ?>
    <?php if ( $settings['subtitle_type_layout'] == 'top_subtitle' ) : ?>
        <p class="subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>>
            <?php echo $settings['subtitle']; ?>
        </p>
    <?php endif; ?>

    <?php // Divider after title ?>
    <?php if ( $settings['divider_position'] == 'before_title' ) : ?>
        <div class="divider" <?php echo $this->getInlineStyleAttr( 'divider' ); ?>></div>
    <?php endif; ?>

    <<?php echo $settings['heading_tag']; ?> <?php echo $this->getInlineStyleAttr( 'heading' ); ?> class="title">
        <?php echo $settings['title']; ?>
    </<?php echo $settings['heading_tag']; ?>>

    <?php // Divider after title ?>
    <?php if ( $settings['divider_position'] == 'after_title' ) : ?>
        <div class="divider" <?php echo $this->getInlineStyleAttr( 'divider' ); ?>></div>
    <?php endif; ?>

    <?php // Subtitle after title ?>
    <?php if ( $settings['subtitle_type_layout'] == 'bottom_subtitle' ) : ?>
        <p class="subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>>
            <?php echo $settings['subtitle']; ?>
        </p>
    <?php endif; ?>

</div>