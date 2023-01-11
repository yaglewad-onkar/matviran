<div class="ohio-team-member-sc team-member <?php echo $this->getWrapperClasses(); ?>">

    <div class="team-member_image image-wrap hover-scale-img" data-cursor-class="cursor-link">

        <?php // Photo ?>
        <?php if ( !empty( $settings['team_member_image']['url'] ) ) : ?>
            <?php if ( !empty( $settings['team_member_link'] ) ) : ?>
                <a href="<?php echo $settings['team_member_link'] ?>" class="team-member-link">
            <?php endif; ?>

                <img 
                    src="<?php echo esc_url( $settings['team_member_image']['url'] ); ?>" 
                    srcset="<?php echo wp_get_attachment_image_srcset( $settings['team_member_image']['id'], 'large' ) ?>"
                    sizes="<?php echo wp_get_attachment_image_sizes( $settings['team_member_image']['id'], 'large' ) ?>"
                    alt="<?php echo esc_attr( get_post_meta( $settings['team_member_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">

            <?php if ( !empty( $settings['team_member_link'] ) ) : ?>
                </a>
            <?php endif; ?>
        <?php endif; ?>

        <div class="wrap team-member_wrap">

            <?php // Outer layout info ?>
            <?php if ( $settings['block_layout'] == 'inner_details' ) : ?>
                <?php if ( !empty( $settings['member_name'] ) ) : ?>
                    <h5 class="team-member_title" <?php echo $this->getInlineStyleAttr( 'name' ); ?>>
                        <?php echo $settings['member_name']; ?>
                    </h5>
                <?php endif; ?>

                <?php if ( !empty( $settings['member_position'] ) ) : ?>
                    <p class="team-member_subtitle" <?php echo $this->getInlineStyleAttr( 'position' ); ?>>
                        <?php echo $settings['member_position']; ?>
                    </p>
                <?php endif; ?>
            <?php endif; ?>

            <?php // Description and social networks ?>
            <div class="team-member_description_wrap">
                <?php if ( !empty( $settings['member_description'] ) ): ?>
                    <p class="team-member_description" <?php echo $this->getInlineStyleAttr( 'description' ); ?>>
                        <?php echo $settings['member_description']; ?>
                    </p>
                <?php endif; ?>

                <?php if ( !empty( $settings['social_networks'] ) ) : ?>
                    <div class="socialbar outline small inverse">
                        <?php foreach ( $settings['social_networks'] as $item ) : ?>
                            <a 
                                target="_blank"
                                href="<?php echo $item['list_link']; ?>" 
                                class="<?php echo esc_attr( $item['list_network'] ); ?>"
                                <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                <?php $this->renderSocialNetworkIcon( $item['list_network'] ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php // Inner layout info ?>
    <?php if ( $settings['block_layout'] != 'inner_details' ) : ?>
        <?php if ( !empty( $settings['member_name'] ) ) : ?>
            <h5 class="team-member_title" <?php echo $this->getInlineStyleAttr( 'name' ); ?>>
                <?php echo $settings['member_name']; ?>
            </h5>
        <?php endif; ?>

        <?php if ( !empty( $settings['member_position'] ) ) : ?>
            <p class="team-member_subtitle" <?php echo $this->getInlineStyleAttr( 'position' ); ?>>
                <?php echo $settings['member_position']; ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>

</div>
