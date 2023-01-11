<div class="service <?php echo $this->getWrapperClasses(); ?>">

	<div class="service_icon">
		<?php $this->showIconInView(); ?>
	</div>

	<?php if ( !empty( $settings['headline'] ) ) : ?>
		<h4 class="service_title"><?php echo $settings['headline']; ?></h4>
	<?php endif; ?>
	
	<p class="service_subtitle">
		<?php if ( !empty( $settings['description'] ) ) { echo $settings['description']; } ?>
	</p>

	<?php if ( $settings['features_list'] ) : ?>
		<ul class="service_list">

			<?php foreach ( $settings['features_list'] as $item ) : ?>
				<li class="service_list_item <?php echo ( $item['list_type'] == 'disabled' ) ? ' disabled' : ' enabled'; ?>">
					<?php if ( $item['list_type'] == 'enabled' ) : ?>
						<i class="ion ion-ios-checkmark"></i>
					<?php elseif ( $item['list_type'] == 'disabled' ) : ?>
						<i class="ion ion-ios-close"></i>
					<?php endif; ?>

					<?php if ( !empty( $item['list_title'] ) ) : ?>
						<span class="title"><?php echo $item['list_title']; ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>

		</ul>
	<?php endif; ?>
</div>