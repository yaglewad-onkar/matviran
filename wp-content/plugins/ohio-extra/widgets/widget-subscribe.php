<?php

if ( ! class_exists( 'ohio_widget_subscribe' ) ) {

	class ohio_widget_subscribe extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'ohio_widget_subscribe',
				'Ohio: ' . esc_html__( 'Subscribe', 'ohio-extra' ),
				array( 'description' => esc_html__( 'Subscribe to social and rss', 'ohio-extra' ) )
			);
		}

		function widget( $args, $instance ) {
			extract( $args );

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

			$title = apply_filters( 'widget_title', $instance['title'] );
			$feedburner = ( isset( $instance['feedburner'] ) ) ? $instance['feedburner'] : false;

			$subscribe_title = ( isset( $subscribe_title ) ) ? $subscribe_title : false;
			$subscribe_description = ( isset( $subscribe_description ) ) ? $subscribe_description : false;

			echo wp_kses( $before_widget, $allowed_tags );

			$unique_id = uniqid( 'ohio_subscr_widget_' );

			if ( ! empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}
		?>

		<div class="subscribe-widget contact-form">

			<?php if ( $subscribe_title ) : ?>
			<h3 class="title widgettitle"><?php echo esc_html( $subscribe_title ); ?></h3>
			<?php endif; ?>

			<?php if ( $subscribe_description ) : ?>
			<p><?php echo wp_kses( $subscribe_description, 'default' ); ?></p>
			<?php endif; ?>

			<?php if ($feedburner): ?>
				<?php echo do_shortcode('[contact-form-7 id="'.$feedburner.'"]') ?>
                <div class="hidden" data-contact-btn="true">
                    <button class="btn btn-flat">
                        <span class="btn-load"></span>
                        <span class="text"></span>
                    </button>
                </div>
			<?php endif; ?>

		</div>

	   <?php
			echo wp_kses( $after_widget, $allowed_tags );
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['feedburner'] = $new_instance['feedburner'];
			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( $instance, array(
				'title' => '',
				'feedburner' => ''
			) );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'feedburner' ) ); ?>"><?php esc_html_e( 'Choose contact form', 'ohio-extra' ); ?>:</label>
				<?php
				$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
				$rs = array();
				if( $posts = get_posts($args) ){
					?>
					<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'feedburner' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feedburner' ) ); ?>">
						<?php foreach($posts as $post){ ?>
							<option value="<?php echo $post->ID ?>" <?php selected($instance['feedburner'], $post->ID) ?>><?php echo $post->post_title ?></option>
					    <?php } ?>
					</select>
					<?php
				}else{
					?>
					<strong class="cf7-not-found"><?php esc_html_e('No Contact Form found', 'ohio-extra') ?></strong>
					<?php
				}
				?>
			</p>
		<?php }
	}

	register_widget( "ohio_widget_subscribe" );

}
