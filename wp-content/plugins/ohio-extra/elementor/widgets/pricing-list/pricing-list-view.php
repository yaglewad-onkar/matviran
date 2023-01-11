<div class="ohio-menu-list-sc menu-list <?php echo $this->getWrapperClasses(); ?>">

    <div class="menu-list-headline">
        <?php if ( !empty( $settings['name'] ) ): ?>
            <h6 class="menu-list-title heading-sm"><?php echo $settings['name']; ?></h6>
        <?php endif; ?>

        <div class="menu-list-price">
            <?php if ( !empty( $settings['regular_price'] ) && !empty( $settings['sale_price'] ) ) : ?>
                <span class="discount-price"><?php echo $settings['regular_price']; ?></span>
                <span class="regular-price"><?php echo $settings['sale_price']; ?></span>
            <?php endif; ?>
            <?php if ( !empty( $settings['regular_price'] ) && empty( $settings['sale_price'] ) ) : ?>
                <span class="regular-price"><?php echo $settings['regular_price']; ?></span>
            <?php endif; ?>
            <?php if ( empty( $settings['regular_price'] ) && !empty( $settings['sale_price'] ) ) : ?>
                <span class="regular-price"><?php echo $settings['sale_price']; ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="menu-list-details">
        <p>
            <?php if ( !empty( $settings['ingredients'] ) ): ?>
                <?php echo $settings['ingredients']; ?>
            <?php endif; ?>
        </p>
        <?php if ( !empty( $settings['mark'] ) ): ?>
            <div class="tag brand-bg-color new"><?php esc_html_e( 'New', 'ohio-extra' ); ?></div>
        <?php endif; ?>
    </div>

</div>
