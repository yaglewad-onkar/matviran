<div class="ohio-testimonial-sc testimonial <?php echo $this->getWrapperClasses(); ?>">

    <?php // Author photo top ?>
    <?php if ( $settings['block_layout'] == 'image_top' && !empty( $settings['author_photo']['url'] ) ) : ?>
        <div class="author-avatar" style="background-image: url(<?php echo esc_url( $settings['author_photo']['url'] ); ?>);"></div>
    <?php endif; ?>

    <?php // Testimonial ?>
    <blockquote <?php echo $this->getInlineStyleAttr( 'testimonial' ); ?>>
        <?php if ( !empty($settings['title']) ) : ?>
            <h6 class="testimonial-headline heading-sm" <?php echo $this->getInlineStyleAttr( 'headline' ); ?>>
                <?php echo $settings['title']; ?>
            </h6>
        <?php endif;?>

        <?php echo $settings['testimonial_text']; ?>
    </blockquote>

    <?php // Author photo bottom ?>
    <?php if ( $settings['block_layout'] == 'image_middle' && !empty( $settings['author_photo']['url'] ) ) : ?>
        <div class="author-avatar" style="background-image: url(<?php echo esc_url( $settings['author_photo']['url'] ); ?>);"></div>
    <?php endif; ?>

    <?php if ( !empty( $settings['author_name'] ) ) : ?>
        <div class="author">
            <?php if ( !empty( $settings['author_name'] ) ) : ?>
                <h6 class="author-name" <?php echo $this->getInlineStyleAttr( 'author_name' ); ?>>
                    <?php echo $settings['author_name']; ?>
                </h6>
            <?php endif; ?>

            <?php if ( !empty( $settings['author_position'] ) ) : ?>
                <p class="author-details" <?php echo $this->getInlineStyleAttr( 'author_position' ); ?>>
                    <?php echo $settings['author_position']; ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>
