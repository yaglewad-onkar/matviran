<div class="ohio-team-members-group-sc team-member cover <?php echo 'column-' . count( $settings['members'] ); ?>"
    data-ohio-cover-box="true">

    <?php foreach ($settings['members'] as $member): ?>

        <?php
            $has_social = false;
            if ( !empty( $member['social_facebook'] ) ) $has_social = true;
            if ( !empty( $member['social_linkedin'] ) ) $has_social = true;
            if ( !empty( $member['social_twitter'] ) ) $has_social = true;
            if ( !empty( $member['social_instagram'] ) ) $has_social = true;
            if ( !empty( $member['social_whatsapp'] ) ) $has_social = true;
            if ( !empty( $member['social_fivehundred'] ) ) $has_social = true;
        ?>

        <div class="cover-content" data-item="true">
            <div class="center-aligned">
                <div class="team-member_wrap">
                    <?php if ( !empty( $member['member_name'] ) ) : ?>
                        <h5 class="team-member_title" <?php echo $this->getInlineStyleAttr( 'name' ); ?>>
                            <?php echo $member['member_name']; ?>
                        </h5>
                    <?php endif; ?>

                    <?php if ( !empty( $member['member_position'] ) ) : ?>
                        <p class="team-member_subtitle" <?php echo $this->getInlineStyleAttr( 'position' ); ?>>
                            <?php echo $member['member_position']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( !empty( $member['member_description'] ) ): ?>
                        <p class="team-member_description" <?php echo $this->getInlineStyleAttr( 'description' ); ?>>
                            <?php echo $member['member_description']; ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( $has_social ) : ?>
                        <div class="socialbar small outline inverse">
                            <?php if ( !empty( $member['social_facebook'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_facebook']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( !empty( $member['social_linkedin'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_linkedin']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( !empty( $member['social_twitter'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_twitter']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( !empty( $member['social_instagram'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_instagram']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( !empty( $member['social_whatsapp'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_whatsapp']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>

                            <?php if ( !empty( $member['social_fivehundred'] ) ): ?>
                                <a 
                                    target="_blank"
                                    href="<?php echo $member['social_fivehundred']; ?>" 
                                    <?php echo $this->getInlineStyleAttr( 'socials' ); ?>>
                                    <i class="fab fa-500px"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="team-member_image" data-trigger="true">
            <?php if ( !empty( $member['team_member_image']['url'] ) ) : ?>
                <img
                    src="<?php echo esc_url( $member['team_member_image']['url'] ); ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $member['team_member_image']['id'], 'large' ) ?>"
                    sizes="<?php echo wp_get_attachment_image_sizes( $member['team_member_image']['id'], 'large' ) ?>"
                    alt="<?php echo esc_attr( get_post_meta( $member['team_member_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>