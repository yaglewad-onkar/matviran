<div class="ohio-progress-bar-sc progress-bar <?php echo $this->getWrapperClasses(); ?>"
    data-ohio-progress-bar="<?php echo esc_attr( $settings['progress_value']['size'] ); ?>">

    <?php // Title and percentage ?>
    <h6 class="progress-bar-headline heading-sm" <?php echo $this->getInlineStyleAttr( 'label' ); ?>>
        <?php if (!empty($settings['label'])): ?>
            <?php echo $settings['label']; ?>
        <?php endif; ?>

        <?php if ( empty($settings['show_percents_tooltip']) ): ?>
            <span <?php echo $this->getInlineStyleAttr( 'percent' ); ?>><span class="percent">0</span>%</span>
        <?php endif; ?>
    </h6>

    <?php // Progress bar ?>
    <div class="progress-bar-track" <?php echo $this->getInlineStyleAttr( 'bar-back' ); ?>
        <?php if ( !empty($settings['show_percents_tooltip']) ) { echo 'data-tooltip="true"'; } ?>>

        <div class="progress-bar-track-inner line brand-bg-color" <?php echo $this->getInlineStyleAttr( 'bar-line' ); ?>>
            <?php if ( !empty($settings['show_percents_tooltip']) ) : ?>
                <div class="line-percent"><span class="percent">0</span>%</div>
            <?php endif; ?>
        </div>

    </div>

</div>
