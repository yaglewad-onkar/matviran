<?php

if ( ! class_exists( 'ohio_widget_recent_posts' ) ) {

	class ohio_widget_recent_posts extends SB_WP_Widget {

		protected $options;

		private $cache_enabled = false;
		private $cache_time = 0;
		private $thumbnail_size = array(80, 80);

		public function __construct( ) {

			$this->options = array(
				array(
					'title', 'text', '',
					'label' => esc_html__( 'Title', 'ohio-extra' ),
					'input' => 'text',
					'filters' => 'widget_title',
					'on_update' => 'esc_attr',
				),
				array(
					'limit', 'int', 5,
					'label' => esc_html__( 'Posts limit', 'ohio-extra' ),
					'input' => 'select',
					'values' => array( 'range', 'from' => 1, 'to' => 20 ),
				),
				array(
					'categories', 'text','',
					'label' => esc_html__( 'Display categories', 'ohio-extra' ),
					'input' => 'checkbox',
				),
				array(
					'date', 'text', '',
					'label' => esc_html__( 'Display date', 'ohio-extra' ),
					'input' => 'checkbox',
				),
				array(
					'comments', 'text', '',
					'label' => esc_html__( 'Display comments', 'ohio-extra' ),
					'input' => 'checkbox',
				),
				array(
					'author', 'text','',
					'label' => esc_html__( 'Display author', 'ohio-extra' ),
					'input' => 'checkbox',
				),
				array(
					'thumb', 'text', '',
					'label' => esc_html__( 'Display thumbnail', 'ohio-extra' ),
					'input' => 'checkbox',
				),
				array(
					'cat', 'text', '',
					'label' => esc_html__( 'Limit categories', 'ohio-extra' ),
					'input' => 'wp_dropdown_categories',
				),
			);

			parent::__construct(
				'ohio_widget_recent_posts',
				'Ohio: ' . esc_html__( 'Recent Posts', 'ohio-extra' ),
				array(
					'description' => esc_html__( 'Recent posts widget', 'ohio-extra' )
				)
			);
		}

		/**
		 * Display widget
		 */
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

			echo wp_kses( $before_widget, $allowed_tags );

			$title = $this->getInstance( 'title' );
			if ( ! empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}

			global $post;

			if ( !$this->cache_enabled || (false === ( $crumwidget = get_transient( 'crumwidget_' . $widget_id ) ) ) ) {
				$args = array(
				  'posts_per_page' => $this->getInstance( 'limit' ),
				  'category_name' => $this->getInstance( 'cat' ),
				);
				$crumwidget = new WP_Query( $args );
				set_transient( 'crumwidget_' . $widget_id, $crumwidget, $this->cache_time );
			}
		?>
			<ul class="recent-posts-list">
		<?php
			$counter = 0;
			if ( $crumwidget->have_posts() ) :
				while ( $crumwidget->have_posts() ) : $crumwidget->the_post();

				$counter++;
				if ( get_the_post_thumbnail() && $this->getInstance( 'thumb' ) == true ) {
					$display_thumbnail = true;
				} else {
					$display_thumbnail = false;
				}

				$post_item_class = '';
				if( $counter == 1 ){
					$post_item_class .= 'active ';
				}
				?>
				<li class="post-item clearfix <?php echo $post_item_class; ?>">

				<?php
					if ( $display_thumbnail ) :
				?>

					<a href="<?php esc_url( the_permalink() ); ?>" class="more">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
					</a>

				<?php endif; ?>

					<div class="content-wrap<?php if ( !$display_thumbnail ) { echo ' no-thumb'; } ?>">
						<?php
							$author = $this->getInstance( 'author' );
							$date = $this->getInstance( 'date' );
							$comments = $this->getInstance( 'comments' );
							$categories = $this->getInstance( 'categories' );
							$title = get_the_title();
							if ( empty( $title ) ) {
								$title = '[' . get_the_date() . ']';
							}
						?>
							<h4 class="text-left title-font">
								<a href="<?php esc_url( the_permalink() ); ?>">
									<?php echo esc_html( $title ); ?>
								</a>
							</h4>
						<?php
							if ( $date ) {
								printf( '<span class="date">%s</span>', get_the_date() );
							}
						?>
						<?php if ( $categories ) : ?>
							<span class="categories"><?php
									$categories = get_the_category( );
									$str_cat = '';
									foreach ( $categories as $cat ) {
										if ( $str_cat != '' ){
											$str_cat .= ', ';
										}
										$str_cat .= $cat->name;
									}
									echo esc_html( $str_cat );
								?>
							</span>
						<?php endif; ?>

						<br>

						<?php if ( $author || $date || $comments ) : ?>
							<div class="subtitle">
								<?php if ( $comments ) : ?>
									<span class="comments">
										<a href="<?php esc_url( the_permalink() ); ?>">
											<?php echo comments_number( esc_html__( 'No comments', 'ohio-extra' ), esc_html__( '1 comment', 'ohio-extra' ), esc_html__( '% comments', 'ohio-extra' ) ); ?>
										</a>
									</span>
								<?php endif; ?>
								<?php
								if ( $author ) {
									printf( '<span class="author">' . esc_html( get_the_author_meta( 'display_name' ) ) );
								} ?>
							</div>
						<?php endif; ?>
					</div>
				</li>
			<?php endwhile;
			endif;
			wp_reset_postdata(); ?>
			</ul>
		<?php
			echo wp_kses( $after_widget, $allowed_tags );
		}
	}

	register_widget( 'ohio_widget_recent_posts' );

}