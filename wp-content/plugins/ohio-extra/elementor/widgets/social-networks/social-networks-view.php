
<div class="ohio-socialbar-sc socialbar <?php echo $this->getWrapperClasses(); ?>">
	<?php if ( is_array($settings['social_networks']) ): ?>
	<?php foreach ( $settings['social_networks'] as $item ) : ?>
		<a 
			target="_blank"
			href="<?php echo $item['list_link']; ?>" 
			class="<?php echo esc_attr( $item['list_network'] ); ?>">

			<?php if ( $show_icon ) : ?>
				<?php $this->renderSocialNetworkIcon( $item['list_network'] ); ?>
			<?php endif; ?>

			<?php if ( $show_text ) : ?>
				<span class="social-text font-titles"><?php
					if ($item['list_network'] == 'vk') $item['list_network'] = 'VK';
					if ($item['list_network'] == 'linkedin') $item['list_network'] = 'LinkedIn';
					if ($item['list_network'] == 'youtube') $item['list_network'] = 'YouTube';
					if ($item['list_network'] == 'whatsapp') $item['list_network'] = 'WhatsApp';
					if ($item['list_network'] == 'tiktok') $item['list_network'] = 'TikTok';

					echo ucfirst( esc_attr( $item['list_network'] ) );
				?></span>
			<?php endif; ?>
		</a>
	<?php endforeach; ?>
	<?php endif; ?>
</div>