<?php

if ( ! class_exists( 'ohio_widget_logo' ) ) {

	class ohio_widget_logo extends SB_WP_Widget {
		
		protected $options;
		
		public function __construct() {

			$this->options = array(
				array(
					'custom_css', 'text', '', 
					'label' => esc_html__( 'Custom CSS classes', 'ohio-extra' ), 
					'input' => 'text'
				)
			);
			
			parent::__construct(
				'ohio_widget_logo',
				'Ohio: ' . esc_html__( 'Logo', 'ohio-extra' ),
				array( 'description' => esc_html__( 'Display site logo', 'ohio-extra' ) )
			);
		}
		
		function widget( $args, $instance ) {
			extract( $args );
			$this->setInstances( $instance, 'filter' );

			$allowed_tags = array(
				'section' => array(
					'id' => array(),
					'class' => array()
				),
				'li' => array(
					'id' => array(),
					'class' => array()
				),
				'div' => array(
					'id' => array(),
					'class' => array()
				),
				'h3' => array(
					'class' => array()
				)
			);

			$css_classes = $this->getInstance( 'custom_css' );
			$logo = OhioSettings::footer_widget_logo();

			$switcher = OhioOptions::get( 'page_dark_mode_switcher', false );
			$dark_scheme = OhioOptions::get( 'page_dark_mode', false );
			$is_dark_scheme = $switcher || $dark_scheme;

			if ($is_dark_scheme) {
				$_logo = OhioOptions::get_global( 'page_header_logo_image' );
		
				$_logo_light = array(
					'default' => false,
					'retina' => false,
					'mobile' => false,
					'have_vector' => false,
					'type' => false
				);
		
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_light'] ) {
						$_logo_light['light'] = $_logo['global_logo_image_light'];
						if ( ( substr( $_logo['global_logo_image_light'], -4, 4) == '.svg' ) ) {
							$_logo_light['have_vector'] = true;
						}
					}
					if ( $_logo['global_logo_image_light_retina'] ) {
						$_logo_light['light_retina'] = $_logo['global_logo_image_light_retina'];
						if ( ( substr( $_logo['global_logo_image_light_retina'], -4, 4) == '.svg' ) ) {
							$_logo_light['have_vector'] = true;
						}
					}
				}
		
				if ( is_array( $_logo ) ) {
					if ( $_logo['global_logo_image_light'] ) {
						$_logo_light['default'] = $_logo['global_logo_image_light'];
					}
					if ( $_logo['global_logo_image_light_retina'] ) {
						$_logo_light['retina'] = $_logo['global_logo_image_light_retina'];
						
					}
					if ( $_logo['global_logo_image_light_mobile'] ) {
						$_logo_light['mobile'] = $_logo['global_logo_image_light_mobile'];
					}
				}
			}

			echo wp_kses( $before_widget, $allowed_tags );
			?>
				<div class="theme-logo <?php if ( $css_classes ) { echo esc_attr( $css_classes ); } ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if ( is_array( $logo ) && $logo['default'] ) : ?>
						<img src="<?php echo esc_url( ( $logo['default'] ) ? $logo['default'] : $logo['retina'] ); ?>" class="main-logo <?php if ( $logo['have_vector'] ) { echo ' svg-logo'; } ?>"<?php if ( $logo['retina'] ) { echo ' srcset="' . $logo['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<?php if ($is_dark_scheme): ?>
							<?php if ($_logo_light['default'] || $_logo_light['retina']): ?>
								<img src="<?php echo esc_url( ( $_logo_light['default'] ) ? $_logo_light['default'] : $_logo_light['retina'] ); ?>" class="<?php if ( $is_dark_scheme ) { echo ' dark-scheme-logo'; }  ?><?php if ( $_logo_light['have_vector'] ) { echo ' svg-logo'; }  ?>" <?php if ( $_logo_light['retina'] ) { echo ' srcset="' . $_logo_light['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" >
							<?php endif; ?>
						<?php endif; ?>
					<?php else : ?>
						<h3 class="title text-left"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
					<?php endif; ?>
					</a>
				</div>
			<?php

			echo wp_kses( $after_widget, $allowed_tags );
		}
	}

	register_widget( 'ohio_widget_logo' );
}