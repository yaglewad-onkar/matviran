<?php

if ( ! class_exists( 'ohio_widget_socialbar_subscribe' ) ) {

	class ohio_widget_socialbar_subscribe extends WP_Widget {

		function __construct() {
			parent::__construct(
				'ohio_widget_socialbar_subscribe',
				'Ohio: ' . esc_html__( 'Socialbar subscribe', 'ohio-extra' ),
				array( 'description' =>  esc_html__( 'Subscribe social buttons', 'ohio-extra' ) )
			);
		}

		function widget( $args, $instance ) {
			extract( $args );
			$title = $instance['title'];

			if ( isset( $instance['behance'] ) ) {
				$behance = $instance['behance'];
			}
			if ( isset( $instance['digg'] ) ) {
				$digg = $instance['digg'];
			}
			if ( isset( $instance['discord'] ) ) {
				$discord = $instance['discord'];
			}
			if ( isset( $instance['dribbble'] ) ) {
				$dribbble = $instance['dribbble'];
			}
			if ( isset( $instance['facebook'] ) ) {
				$facebook = $instance['facebook'];
			}
			if ( isset( $instance['flickr'] ) ) {
				$flickr = $instance['flickr'];
			}
			if ( isset( $instance['github'] ) ) {
				$github = $instance['github'];
			}
			if ( isset( $instance['instagram'] ) ) {
				$instagram = $instance['instagram'];
			}
			if ( isset( $instance['kaggle'] ) ) {
				$kaggle = $instance['kaggle'];
			}
			if ( isset( $instance['linkedin'] ) ) {
				$linkedin = $instance['linkedin'];
			}
			if ( isset( $instance['medium'] ) ) {
				$medium = $instance['medium'];
			}
			if ( isset( $instance['mixer'] ) ) {
				$mixer = $instance['mixer'];
			}
			if ( isset( $instance['pinterest'] ) ) {
				$pinterest = $instance['pinterest'];
			}
			if ( isset( $instance['quora'] ) ) {
				$quora = $instance['quora'];
			}
			if ( isset( $instance['reddit'] ) ) {
				$reddit = $instance['reddit'];
			}
			if ( isset( $instance['snapchat'] ) ) {
				$snapchat = $instance['snapchat'];
			}
			if ( isset( $instance['soundcloud'] ) ) {
				$soundcloud = $instance['soundcloud'];
			}
			if ( isset( $instance['spotify'] ) ) {
				$spotify = $instance['spotify'];
			}
			if ( isset( $instance['teamspeak'] ) ) {
				$teamspeak = $instance['teamspeak'];
			}
			if ( isset( $instance['telegram'] ) ) {
				$telegram = $instance['telegram'];
			}
			if ( isset( $instance['tiktok'] ) ) {
				$tiktok = $instance['tiktok'];
			}
			if ( isset( $instance['tripadvisor'] ) ) {
				$tripadvisor = $instance['tripadvisor'];
			}
			if ( isset( $instance['tumblr'] ) ) {
				$tumblr = $instance['tumblr'];
			}
			if ( isset( $instance['twitch'] ) ) {
				$twitch = $instance['twitch'];
			}
			if ( isset( $instance['twitter'] ) ) {
				$twitter = $instance['twitter'];
			}
			if ( isset( $instance['vimeo'] ) ) {
				$vimeo = $instance['vimeo'];
			}
			if ( isset( $instance['vine'] ) ) {
				$vine = $instance['vine'];
			}
			if ( isset( $instance['vk'] ) ) {
				$vk = $instance['vk'];
			}
			if ( isset( $instance['whatsapp'] ) ) {
				$whatsapp = $instance['whatsapp'];
			}
			if ( isset( $instance['xing'] ) ) {
				$xing = $instance['xing'];
			}
			if ( isset( $instance['youtube'] ) ) {
				$youtube = $instance['youtube'];
			}
			if ( isset( $instance['500px'] ) ) {
				$fivehundredpx = $instance['500px'];
			}
			
			
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

			if ( ! empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}
			?>
			<div class="socialbar small outline new-tab-links">

				<?php if ( !empty( $behance ) ) : ?>
					<a href="<?php echo esc_url( $behance ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-behance"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $digg ) ) : ?>
					<a href="<?php echo esc_url( $digg ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-digg"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $discord ) ) : ?>
					<a href="<?php echo esc_url( $discord ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-discord"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $dribbble ) ) : ?>
					<a href="<?php echo esc_url( $dribbble ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-dribbble"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $facebook ) ) : ?>
					<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-facebook-f"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $flickr ) ) : ?>
					<a href="<?php echo esc_url( $flickr ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-flickr"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $github ) ) : ?>
					<a href="<?php echo esc_url( $github ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-github"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $instagram ) ) : ?>
					<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-instagram"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $kaggle ) ) : ?>
					<a href="<?php echo esc_url( $kaggle ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-kaggle"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $linkedin ) ) : ?>
					<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-linkedin"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $medium ) ) : ?>
					<a href="<?php echo esc_url( $medium ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-medium-m"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $mixer ) ) : ?>
					<a href="<?php echo esc_url( $mixer ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-mixer"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $pinterest ) ) : ?>
					<a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-pinterest"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $quora ) ) : ?>
					<a href="<?php echo esc_url( $quora ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-quora"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $reddit ) ) : ?>
					<a href="<?php echo esc_url( $reddit ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-reddit"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $snapchat ) ) : ?>
					<a href="<?php echo esc_url( $snapchat ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-snapchat"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $soundcloud ) ) : ?>
					<a href="<?php echo esc_url( $soundcloud ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-soundcloud"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $spotify ) ) : ?>
					<a href="<?php echo esc_url( $spotify ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-spotify"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $teamspeak ) ) : ?>
					<a href="<?php echo esc_url( $teamspeak ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-teamspeak"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $telegram ) ) : ?>
					<a href="<?php echo esc_url( $telegram ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-telegram-plane"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $tiktok ) ) : ?>
					<a href="<?php echo esc_url( $tiktok ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-tiktok"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $tripadvisor ) ) : ?>
					<a href="<?php echo esc_url( $tripadvisor ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-tripadvisor"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $tumblr ) ) : ?>
					<a href="<?php echo esc_url( $tumblr ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-tumblr"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $twitch ) ) : ?>
					<a href="<?php echo esc_url( $twitch ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-twitch"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $twitter ) ) : ?>
					<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-twitter"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $vimeo ) ) : ?>
					<a href="<?php echo esc_url( $vimeo ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-vimeo"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $vine ) ) : ?>
					<a href="<?php echo esc_url( $vine ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-vine"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $vk ) ) : ?>
					<a href="<?php echo esc_url( $vk ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-vk"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $whatsapp ) ) : ?>
					<a href="<?php echo esc_url( $whatsapp ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-whatsapp"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $xing ) ) : ?>
					<a href="<?php echo esc_url( $xing ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-xing"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $youtube ) ) : ?>
					<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-youtube"></i>
					</a>
				<?php endif; ?>

				<?php if ( !empty( $fivehundredpx ) ) : ?>
					<a href="<?php echo esc_url( $fivehundredpx ); ?>" target="_blank" class="social rounded">
						<i class="fab fa-500px"></i>
					</a>
				<?php endif; ?>
				
			</div>
			<?php
			echo wp_kses( $after_widget, $allowed_tags );
		}

		function update( $new, $old){
			$new = wp_parse_args( $new, array(
				'title' => '',
				'behance' => '',
                'digg' => '',
                'discord' => '',
                'dribbble' => '',
                'facebook' => '',
                'flickr' => '',
                'github' => '',
                'instagram' => '',
                'kaggle' => '',
                'linkedin' => '',
                'medium' => '',
                'mixer' => '',
                'pinterest' => '',
                'quora' => '',
                'reddit' => '',
                'snapchat' => '',
                'soundcloud' => '',
                'spotify' => '',
                'teamspeak' => '',
                'telegram' => '',
                'tiktok' => '',
                'tripadvisor' => '',
                'tumblr' => '',
                'twitch' => '',
                'twitter' => '',
                'vimeo' => '',
                'vine' => '',
                'vk' => '',
                'whatsapp' => '',
                'xing' => '',
				'youtube' => '',
				'500px' => ''
			) );
			return $new;
		}

		function form( $instance ) {
			$instance = wp_parse_args( $instance, array(
				'title' => '',
				'behance' => '',
                'digg' => '',
                'discord' => '',
                'dribbble' => '',
                'facebook' => '',
                'flickr' => '',
                'github' => '',
                'instagram' => '',
                'kaggle' => '',
                'linkedin' => '',
                'medium' => '',
                'mixer' => '',
                'pinterest' => '',
                'quora' => '',
                'reddit' => '',
                'snapchat' => '',
                'soundcloud' => '',
                'spotify' => '',
                'teamspeak' => '',
                'telegram' => '',
                'tiktok' => '',
                'tripadvisor' => '',
                'tumblr' => '',
                'twitch' => '',
                'twitter' => '',
                'vimeo' => '',
                'vine' => '',
                'vk' => '',
                'whatsapp' => '',
                'xing' => '',
				'youtube' => '',
				'500px' => ''
			) );
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>"><?php esc_html_e( 'Behance', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'behance' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'behance' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['behance'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'digg' ) ); ?>"><?php esc_html_e( 'Digg', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'digg' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'digg' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['digg'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'discord' ) ); ?>"><?php esc_html_e( 'Discord', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'discord' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'discord' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['discord'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>"><?php esc_html_e( 'Dribbble', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'dribbble' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dribbble' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['dribbble'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>"><?php esc_html_e( 'Flickr', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'flickr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'flickr' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['flickr'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>"><?php esc_html_e( 'GitHub', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['github'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'kaggle' ) ); ?>"><?php esc_html_e( 'Kaggle', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'kaggle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'kaggle' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['kaggle'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['linkedin'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'medium' ) ); ?>"><?php esc_html_e( 'Medium', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'medium' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'medium' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['medium'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'mixer' ) ); ?>"><?php esc_html_e( 'Mixer', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mixer' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mixer' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['mixer'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'quora' ) ); ?>"><?php esc_html_e( 'Quora', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quora' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quora' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['quora'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>"><?php esc_html_e( 'Reddit', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'reddit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'reddit' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['reddit'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>"><?php esc_html_e( 'Snapchat', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'snapchat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'snapchat' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['snapchat'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'soundcloud' ) ); ?>"><?php esc_html_e( 'SoundCloud', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'soundcloud' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'soundcloud' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['soundcloud'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'spotify' ) ); ?>"><?php esc_html_e( 'Spotify', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spotify' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spotify' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['spotify'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'teamspeak' ) ); ?>"><?php esc_html_e( 'TeamSpeak', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'teamspeak' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'teamspeak' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['teamspeak'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>"><?php esc_html_e( 'Telegram', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'telegram' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['telegram'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>"><?php esc_html_e( 'TikTok', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tiktok' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['tiktok'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tripadvisor' ) ); ?>"><?php esc_html_e( 'Tripadvisor', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tripadvisor' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tripadvisor' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['tripadvisor'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>"><?php esc_html_e( 'Tumblr', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tumblr' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tumblr' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['tumblr'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>"><?php esc_html_e( 'Twitch', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitch' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitch' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitch'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php esc_html_e( 'Vimeo', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vine' ) ); ?>"><?php esc_html_e( 'Vine', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vine' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vine' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vine'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>"><?php esc_html_e( 'VKontakte', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vk' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vk' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vk'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>"><?php esc_html_e( 'WhatsApp', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whatsapp' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whatsapp' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['whatsapp'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>"><?php esc_html_e( 'Xing', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'xing' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'xing' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['xing'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( '500px' ) ); ?>"><?php esc_html_e( '500px', 'ohio-extra' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( '500px' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( '500px' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['500px'] ); ?>"/>
		</p>
	
	<?php
		}
	}

	register_widget( 'ohio_widget_socialbar_subscribe' );
}