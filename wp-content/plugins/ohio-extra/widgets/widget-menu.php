<?php

if ( ! class_exists( 'ohio_widget_logo' ) ) {

	class ohio_widget_navigation extends WP_Widget {
		private $_menu_directions;
		
		function __construct() {
			
			$this->_menu_directions = array(
				'left' => esc_html__( 'Left', 'ohio-extra' ),
				'right' => esc_html__( 'Right', 'ohio-extra' ),
				'center' => esc_html__( 'Center', 'ohio-extra' ),
			);
			
			parent::__construct(
				'ohio_widget_navigation',
				'Ohio: ' . esc_html__( 'Navigation', 'ohio-extra' ),
				array( 'description' => esc_html__( 'Sidebar navigation', 'ohio-extra' ) )
			);
		}

		function widget( $ss, $instance ) {
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
			
			// Get menu
			$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

			if ( ! $nav_menu ) {
				return false;
			}

			$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo wp_kses( $before_widget, $allowed_tags );

			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses( $before_title . esc_html( $instance['title'] ) . $after_title, $allowed_tags );
			}

			$menu_options = array(
				'menu' => $nav_menu,
				'menu_class' => 'list-box list-box-border-items widget-sidebar-menu-' . $instance['menu_direction'],
			);

			if ( has_nav_menu( $nav_menu ) ) {
				wp_nav_menu( $menu_options );
			}

			echo wp_kses( $after_widget, $allowed_tags );
		}

		function update( $new_instance, $old_instance ) {
			$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
			$instance['nav_menu'] = ( int ) $new_instance['nav_menu'];
			if ( isset( $new_instance['menu_direction'] ) && !empty( $new_instance['menu_direction'] ) ) {
				$instance['menu_direction'] = $new_instance['menu_direction'];
			} else {
				$instance['menu_direction'] = $this->_menu_directions[0];
			}
			
			return $instance;
		}

		function form( $instance ) {
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
			if ( isset( $instance['menu_direction'] ) && !empty( $instance['menu_direction'] ) ) {
				$menu_direction = $instance['menu_direction'];
			} else {
				if ( is_array( $this->_menu_directions ) && count( $this->_menu_directions) > 0 ) {
					foreach ( $this->_menu_directions as $_value ) {
						$menu_direction = $_value;
						break;
					}
				}
			}

			// Get menus
			$menus = get_terms( [
                'taxonomy' => 'nav_menu',
                'hide_empty' => false,
            ] );

			// If no menus exists, direct the user to go and create some.
			if ( ! $menus ) {
				echo '<p>'. sprintf( esc_html__( 'No menus have been created yet. %s Create some %s.', 'ohio-extra' ), '<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">', '</a>' ) . '</p>';
				return;
			}
			
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ) ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"><?php esc_html_e( 'Select Menu', 'ohio-extra' ); ?>:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nav_menu' ) ); ?>">
					<?php
					foreach ( $menus as $menu ) {
						$selected = ( $nav_menu == $menu->term_id ) ? ' selected="selected"' : '';
						echo '<option'. $selected .' value="'. esc_attr( $menu->term_id ) .'">'. esc_html( $menu->name ) .'</option>';
					}
					?>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'menu_direction' ) ); ?>"><?php esc_html_e( 'Menu Direction', 'ohio-extra' ); ?>:</label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'menu_direction' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'menu_direction' ) ); ?>">
					<?php
					foreach ( $this->_menu_directions as $value => $label ) {
						$selected = $menu_direction == $value ? ' selected="selected"' : '';
						echo '<option'. $selected .' value="'. esc_attr( $value ) .'">'. esc_html( $label ) .'</option>';
					}
					?>
				</select>
			</p>
		<?php
		}
	}

	register_widget( 'ohio_widget_navigation' );

}