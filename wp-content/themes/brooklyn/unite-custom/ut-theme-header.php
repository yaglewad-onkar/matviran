<?php  if (!defined('UT_VERSION')) {
    exit; 
}

/**
 * Default Menu ( Placeholder )
 */

if( !function_exists('ut_default_menu') ) {

    function ut_default_menu() {

        echo '<nav id="navigation" class="grid-85 hide-on-tablet hide-on-mobile ">';

            echo '<ul id="menu-main">';

                echo '<li><a class="ut-setup-menu" href="' . get_admin_url() . 'nav-menus.php">' . esc_html__( 'Set Up Your Menu', 'unitedthemes' ) . '</a></li>';

            echo '</ul>';

        echo '</nav>';

    }

}


/**
 * Logo Configuration Class
 *
 * @version   1.1.0
 *
 */

if( !function_exists( 'ut_return_logo_config' ) ) {

    function ut_return_logo_config( $option = '' , $fallback = '' ) {
        
        // no option has been set
        if( empty( $option ) ) {
            
            return false;
            
        }
        
        // get current object
        $current = get_queried_object();
        
        /*if( isset( $current->ID ) ) {
            
            // check if global overwrite is active and meta value has been set
            if( get_post_meta( $current->ID, $option . '_global_overwrite', true ) && get_post_meta( $current->ID, $option, true  ) ) {
                
                return get_post_meta( $current->ID, $option, true  );    
            
            } else {
                
                return get_theme_mod( $option, $fallback );
                
            }          
        
        }*/        
        
        if( isset( $current->ID ) ) {
            
            // check if we use globals or not
            if( get_post_meta( $current->ID, 'ut_navigation_config', true ) == 'on' || !get_post_meta( $current->ID, 'ut_navigation_config', true ) ) {
                
                return get_theme_mod( $option, $fallback );
            
            }
            
            if( get_post_meta( $current->ID, $option, true ) ) {
                
                return get_post_meta( $current->ID, $option, true );
                
            } else {
                
                return get_theme_mod( $option, $fallback );    
                
            }           
        
        }
        
        return get_theme_mod( $option, $fallback );
        
           
    }
    
}


/**
 * Top Header Class
 *
 * @since     4.9
 * @version   1.0.0
 *
 */

if( !class_exists( 'UT_Header_Class' ) ) {	
    
    class UT_Header_Class {
		
		/**
         * Header Style
         * @var string
         */
        
        public $style;
		
		
		/**
         * Top Header Social Icons
         * @var array
         */
        
        public $top_social;
		
        
		/**
         * Global Social Icons
         * @var array
         */
        
        public $global_social;
		
		
		/**
         * Overlay Navigation
         * @var bolean
         */
        
		public $overlay_navigation = false;
		
				
		/**
         * Header Search
         * @var bolean
         */
        
		public $header_search = false;
		
        
        /**
         * Top Header Left Area
         * @var bolean
         */
        
		public $top_header_left;
        
        
        /**
         * Top Header Right Area
         * @var bolean
         */
        
		public $top_header_right;
       
        
        /**
         * Top Header Priority
         * @var bolean
         */
        
		public $top_header_priority;
        
        
		/**
		 * Instantiates the class
		 */
        
		function __construct() {
            
            // overlay navigation
			add_action( 'ut_after_footer_hook' , array( $this, 'overlay_navigation' ) );
			
			// overlay search
			add_action( 'ut_after_footer_hook' , array( $this, 'create_search_field' ) );		
			
            // ajax cart
            add_action( 'wp_ajax_ut_get_woo_mini_cart' , array( $this, 'woo_shopping_cart_view' ) );
            add_action( 'wp_ajax_nopriv_ut_get_woo_mini_cart' , array( $this, 'woo_shopping_cart_view' ) );
            
			$this->style = apply_filters( 'unite_header_layout', 'default' );
			$this->top_social = ut_return_header_config( 'ut_top_header_social_icons' );
			
            $this->global_social = ot_get_option( 'ut_company_social_icons' ); // only from theme options
			
		}
		
        
		/**
         * Turn an array of attributes into a string
         *
         * @access public
         */ 
        
        public function create_attributes_string( $attributes ) {
            
            $attributes = implode(' ', array_map(
                function ($v, $k) {                             
                    if( !empty( $v ) )
                    return sprintf("%s=\"%s\"", $k, $v);                         
                },
                $attributes,
                array_keys( $attributes )
            ) );
            
            return $attributes;
        
        }
		
        
        /**
         * Assign Header Scroll Depth for Animation Purposes
         *
         * @access public
         */ 
        
        public function header_data_scrolldepth() {
            
            return ut_return_header_config( 'ut_navigation_scroll_depth', 1 );            
            
        }        
		
        
        /**
         * Assign Header Total Height for Animation Purposes
         *
         * @access public
         */ 
        
        public function header_data_totalheight() {
            
            // top header settings
            $top_header = 0;
            
            if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
                
                $top_header = 40;
                
                // optional border
                if( ut_return_header_config( 'ut_top_header_border_bottom', 'off' ) == 'on' ) {
                
                    $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );

                    if( !empty( $ut_top_header_border_bottom_style['border-bottom-style'] ) && $ut_top_header_border_bottom_style['border-bottom-style'] != 'none' ) {

                        $top_header += $ut_top_header_border_bottom_style['border-bottom-width'];

                    }
                
                }
                    
            }
            
			if( $this->style == 'style-5' || $this->style == 'style-6' || $this->style == 'style-7' || $this->style == 'style-9' ) {
				
                return $top_header + 161; // (161 contains an additional 1px for the hardcoded border)
            
            } elseif( $this->style == 'style-4' ) {
                
                if( ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'on' ) {                    
                    
                    return $top_header + _ut_header_style_4_logo_calculation() + 80 + 1;
                    
                } else {
                    
                    return $top_header + _ut_header_style_4_logo_calculation() + 80;
                    
                }
                
			} else {
				
                // get default navigation height
                $ut_navigation_height = ut_return_header_config( 'ut_navigation_height', 80 );
                
				return $top_header + $ut_navigation_height;
				
			}
           
        
        }
        
        
		/**
         * Assign Header Line Height for Animation Purposes
         *
         * @access public
         */ 
        
        public function header_data_lineheight() {
            
			if( $this->style == 'style-4' || $this->style == 'style-5' || $this->style == 'style-6' || $this->style == 'style-7' || $this->style == 'style-9' ) {
				
                if( ut_return_header_config( 'ut_navigation_scroll_depth', 1 ) == 2 ) {
                    
                    return 160;                    
                    
                } else {
                    
                    return 80;
                    
                }
            
            } else {
				
                // get default navigation height
                $ut_navigation_height = ut_return_header_config( 'ut_navigation_height', 80 );
                
                // fallback and exceptions ( default style can manually turn off the logo )
                if( $this->style == 'default' && ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {
                    
                    $ut_navigation_height = ut_return_header_config( 'ut_navigation_height', 80 );

                }
                
				return $ut_navigation_height;
				
			}
           
        
        }
		
		
		/** 
		 * Prints a Default Menu forwarding the user to "Appearance" > "Menus"
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function default_menu( $classes = '' ) {

			echo '<nav id="navigation" class="' , $classes , '">';

				echo '<ul id="menu-main" class="ut-horizontal-navigation">';

					echo '<li><a class="ut-setup-menu ut-main-navigation-link" href="' , get_admin_url() , 'nav-menus.php"><span>' , esc_html__('Set Up Your Menu', 'unitedthemes') , '</span></a></li>';

				echo '</ul>';

			echo '</nav>';

		}
		
		
		/**
         * Get Main Navigation Classes
         *
         * @access public
         */ 
        
        public function primary_navigation_classes( $class = '' ) {

			// start class array
			$classes = array();

            // main class
            $classes[] = 'ut-horizontal-navigation';
            
            // extra class for header style
            $classes[] = 'ut-navigation-for-' . $this->style;
            
			// grid and responsive definitions
			if( $this->style == 'style-2' ) {
				
				$classes[] = 'grid-70';
			
			} elseif( $this->style == 'style-3' ) {	
				
				$classes[] = 'grid-40';
				
			} elseif( $this->style == 'style-4' || $this->style == 'style-7' ) {
                
                $classes[] = 'grid-100';
                
            } elseif( $this->style == 'style-5' ) {
                
                $classes[] = 'grid-80';
                
            } elseif( $this->style == 'style-6' ) {
                
				$classes[] = 'grid-80';
			
            } elseif( $this->style == 'style-9' ) {
                
                $classes[] = 'grid-80';
                
			} else {
				
				$classes[] = 'grid-85';
				
			}
			
            // fallback to default header and special configuration
            if( $this->style == 'default' && ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {
		      
                // reset
                $classes   = array();
                
                // main class
                $classes[] = 'ut-horizontal-navigation';
            
                // extra class for header style
                $classes[] = 'ut-navigation-for-' . $this->style;
                
                // width
                $classes[] = 'grid-100';

                if( ut_return_header_config( 'ut_site_navigation_center', 'yes' ) == 'yes' ) {
                    $classes[] = 'ut-navigation-centered';
                }

            }
            
			$classes[] = 'hide-on-tablet';
			$classes[] = 'hide-on-mobile';
			
            // navigation style
            $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
                
            // animation line position
            if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                
                $classes[] = 'ut-navigation-style-animation-line-' . ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' );
                
                if( ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' ) == 'middle' ) {
                    
                    $classes = array_diff( $classes, array( 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' ) ) );
                    
                } 
            }  
            
            // navigation animation
            if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-animation';
			}
            
			// navigation column animation
			if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'no' && ut_return_header_config( 'ut_navigation_column_animation', 'no' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-column-animation';
			}
			
			// navigation link animation
			if( ut_return_header_config( 'ut_navigation_column_link_animation', 'no' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-link-animation';
				$classes[] = 'ut-navigation-with-link-animation-type-' . ut_return_header_config( 'ut_navigation_column_link_animation_type', 'background' );
			}
			
            // navigation flush
            if( ( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' ) && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
                $classes[] = 'ut-flush-nav'; 
            }

	        // navigation description
	        $classes[] = 'ut-navigation-with-description-above';

            // attach custom classes
			$classes[] = $class;
			
			// output                
			return implode( ' ' , $classes );           
            
        
        }
		
		
		/**
         * Get Main Navigation (Secondary) Classes
         *
         * @access public
         */ 
        
        public function secondary_navigation_classes( $class = '' ) {
            
			// start class array
			$classes = array();
			
            // main class
            $classes[] = 'ut-horizontal-navigation';
            
			// grid and responsive definitions
			if( $this->style == 'style-2' ) {
				
				$classes[] = 'grid-70';
			
			} elseif( $this->style == 'style-3' ) {
				
				$classes[] = 'grid-40';
				
			} else {
				
				$classes[] = 'grid-85';
				
			}
			
			$classes[] = 'hide-on-tablet';
			$classes[] = 'hide-on-mobile';

            // navigation style  
            $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
            
            // animation line position
            if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                
                $classes[] = 'ut-navigation-style-animation-line-' . ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' );
                
                if( ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' ) == 'middle' ) {
                    
                    $classes = array_diff( $classes, array( 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' ) ) );
                    
                }
                
            }  
            
            // navigation animation
            if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-animation';
			}
                        
			// navigation column animation
			if( ut_return_header_config( 'ut_navigation_column_animation', 'no' ) == 'yes' ) {
		
				$classes[] = 'ut-navigation-with-column-animation';

			}
			
			// navigation link animation
			if( ut_return_header_config( 'ut_navigation_column_link_animation', 'no' ) == 'yes' ) {

				$classes[] = 'ut-navigation-with-link-animation';
				$classes[] = 'ut-navigation-with-link-animation-type-' . ut_return_header_config( 'ut_navigation_column_link_animation_type', 'background' );

			}

	        // navigation description
	        $classes[] = 'ut-navigation-with-description-above';

            // attach custom classes
			$classes[] = $class;
			
			// output                
			return implode( ' ' , $classes );           
            
        
        }
		
		
		/**
         * Create Overlay Menu
         *
         * @access public
         */ 
        
        public function create_overlay_menu() {
			
			$container_class= array();

			// underline animation effect
			$container_class[] = 'ut-overlay-nav-animation-' . ot_get_option( 'ut_global_overlay_link_animation', 'off' );
			$container_class[] = 'ut-overlay-nav-' . ot_get_option( 'ut_global_overlay_content_vertical_align', 'middle' );
			
			$overlay_menu = array(
				'container'         => 'nav',
				'container_id'      => 'ut-overlay-nav',
				'container_class'   => implode(" ", $container_class),
				'items_wrap'        => '<ul id="%1$s" class="%2$s ut-overlay-menu">%3$s</ul>',
				'theme_location'    => 'primary', 
				'walker'            => new ut_menu_walker()
			);
			
            if( has_nav_menu( 'overlay' ) ) {
                
                $overlay_menu['theme_location'] = 'overlay';
				echo wp_nav_menu( $overlay_menu );

			} elseif( has_nav_menu( 'primary' ) ) {
                
                $overlay_menu['theme_location'] = 'primary';                
				echo wp_nav_menu( $overlay_menu );

			}            
			
		}
		
		
		/** 
		 * Prints the main navigation
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */

		public function primary_navigation( $class = ''  ) {

			if ( !has_nav_menu( 'primary' ) ) {    

				echo $this->default_menu( $this->primary_navigation_classes( $class ) );

			} 
			
			if( ot_get_option( 'ut_site_layout', 'multisite' ) == 'onepage' ) {
				
                if( class_exists('ut_menu_walker') ) {
                
                    $menu = array(
                        'echo'              => false,
                        'container'         => 'nav',
                        'container_id'      => 'navigation',
                        'fallback_cb'       => false,
                        'menu_class'        => 'ut-navigation-menu menu',
                        'container_class'   => $this->primary_navigation_classes( $class ),
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'theme_location'    => 'primary',
                        'link_before'		=> '<span>',
                        'link_after'		=> '</span>',
                        'walker'            => new ut_menu_walker()
                    );

	                echo wp_nav_menu( $menu );
				
                }                    
                    
			} else {
			 
                if( class_exists('WP_UT_Menu_Walker') ) {
                
                    $menu = array(
                        'echo'              => false,
                        'container'         => 'nav',
                        'container_id'      => 'navigation',
                        'fallback_cb'       => false,
                        'menu_class'        => 'ut-navigation-menu menu',
                        'container_class'   => $this->primary_navigation_classes( $class ),
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'theme_location'    => 'primary', 
                        'link_before'		=> '<span>',
                        'link_after'		=> '</span>',
                        'walker'            => new WP_UT_Menu_Walker()
                    );

	                echo wp_nav_menu( $menu );
				
                }
                    
			}


		}
		
		
		/** 
		 * Prints the main navigation
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */

		public function secondary_navigation( $class = ''  ) {
			
			if ( !has_nav_menu( 'secondary' ) ) {    

				echo $this->default_menu( $this->secondary_navigation_classes( $class ) );

			} else {
			    
                if( class_exists('WP_UT_Menu_Walker') ) {
                
                    $menu = array(
                        'echo'              => false,
                        'container'         => 'nav',
                        'container_id'      => 'navigation-secondary',
                        'fallback_cb'       => 'ut_default_menu',
                        'menu_class'        => 'ut-navigation-menu menu',
                        'container_class'   => $this->secondary_navigation_classes( $class ),
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'theme_location'    => 'secondary', 
                        'link_before'		=> '<span>',
                        'link_after'		=> '</span>',
                        'walker'            => new WP_UT_Menu_Walker()
                    );
				
                echo wp_nav_menu( $menu );
                    
                }
                
            }
			
		}
		
        
        /** 
		 * Prints the custom navigation
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */

        public function custom_navigation( $option_key ) {
			
            $menu         = ut_return_header_config( 'ut_header_' . $option_key . '_custom_menu' );
            $drodown_text = ut_return_header_config( 'ut_header_' . $option_key . '_custom_menu_label', esc_html__( 'More', 'unitedthemes' ) );
            
            // force dropdown since space is limited
            $item_wrap = '<li class="ut-menu-item-lvl-0 ut-parent ut-has-children"><a class="ut-main-navigation-link"><span>' . $drodown_text . '</span></a><ul class="sub-menu">%3$s</ul></li>';
            
            // extra classes
            $classes = array('ut-horizontal-navigation');
            
            // navigation style  
            $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
            
            // animation line position
            if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                
                $classes[] = 'ut-navigation-style-animation-line-' . ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' );
                
                if( ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' ) == 'middle' ) {
                    
                    $classes = array_diff( $classes, array( 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' ) ) );
                    
                }
                
            }                
                
            // navigation animation
            if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-animation';
			}
            
            // navigation column animation
			if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'no' && ut_return_header_config( 'ut_navigation_column_animation', 'no' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-column-animation';
			}
			
			// navigation link animation
			if( ut_return_header_config( 'ut_navigation_column_link_animation', 'no' ) == 'yes' ) {
				$classes[] = 'ut-navigation-with-link-animation';
				$classes[] = 'ut-navigation-with-link-animation-type-' . ut_return_header_config( 'ut_navigation_column_link_animation_type', 'background' );
			}
            
            if( $menu ) {
            
                $custom_navigation = array(
                    'echo'              => false,
                    'menu'              => $menu,
                    'container'         => 'div',
                    'container_id'      => 'ut-header-' . $option_key . '-extra-module',
                    'container_class'   => implode(" ", $classes),
                    'menu_class'        => 'ut-navigation-menu ut-navigation-dropdown-only menu',
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">' . $item_wrap . '</ul>',
                    'link_before'		=> '<span>',
                    'link_after'		=> '</span>',
                );

                echo wp_nav_menu( $custom_navigation );
            
            } else {
                
                echo '&nbsp;';
                
            }
            
            return;
			
		}
        
		
		/** 
		 * Prints Hamburger Icon
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		function transform_button( $id = '', $wrap_id = 'ut-hamburger-wrap-overlay', $class = '' ) { ?>

			<div id="<?php echo esc_attr( $wrap_id ); ?>" class="ut-hamburger-wrap">

				<a id="<?php echo esc_attr( $id ); ?>" class="ut-hamburger ut-hamburger--cross <?php echo $class; ?>" type="button">
					<span></span>
				</a>

			</div>

			<?php 


		}
		
        
        /** 
		 * Woocommerce Shopping Cart Text
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function woo_shopping_cart_text( $location = 'top-header' ) {
		  
            esc_html_e( 'Cart', 'unitedthemes' );				
			
		}
		
        
		/** 
		 * Woocommerce Shopping Cart Display
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function woo_shopping_cart_top_header() {
			
			if( !is_woocommerce_activated() ) {
				return;
			} ?>

                <div class="ut-top-header-sub-menu ut-header-mini-cart"> 

                    <a class="ut-header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'unitedthemes' ); ?>">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ut-header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>

                    <?php $this->woo_shopping_cart_view(); ?>
                    
                </div>    

			<?php
			
		}
		
		
        /** 
		 * Woocommerce Shopping Cart Display
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function woo_shopping_cart_header() {
			
			if( !is_woocommerce_activated() ) {
				return;
			} 

			ob_start(); ?>

                <a class="ut-main-navigation-link ut-header-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart', 'unitedthemes' ); ?>">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="ut-header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                </a>

                <?php $this->woo_shopping_cart_view('header'); ?>                    

			<?php			
            
			return ob_get_clean();
			
		}

        
        /** 
		 * Woocommerce Shopping Cart View
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
        public function woo_shopping_cart_view( $location = 'top-header' ) {
            
            $classes[] = ( $location == 'header' ) ? 'sub-menu' : '';
            
            if ( WC()->cart->is_empty() ) {
                
                $classes[] = 'ut-header-mini-cart-no-content';        
                
            }
            
            echo '<ul class="' . implode( " ", $classes ) . '">';
                
                echo '<li class="ut-header-mini-cart-content">';
            
                    echo '<ol class="ut-header-mini-cart-overflow-container">';
            
                        if ( ! WC()->cart->is_empty() ) {

                            $this->woo_shopping_cart_view_items();

                        } else {
                            
                            echo '<li class="ut-header-mini-cart-item ut-header-mini-cart-item-empty clearfix">';    
                            
                                echo '<a class="ut-header-mini-cart-link" href="' , esc_url( get_permalink( wc_get_page_id('shop') ) ) , '">';
                            
                                    esc_html_e( 'Your cart is currently empty.', 'unitedthemes' );
                            
                                echo '</a>';
                            
                            echo '</li>';            

                        }
            
                    echo '</ol>';

                echo '</li>';

                echo '<li class="ut-header-mini-cart-action">';

                    echo '<div class="ut-header-mini-cart-summary clearfix">';    

                        echo '<span class="ut-header-mini-cart-total-count">' , WC()->cart->get_cart_contents_count , ' ' . esc_html__( 'item(s)', 'unitedthemes' ) . '</span>';
                        echo '<span class="ut-header-mini-cart-total-price">' , WC()->cart->get_cart_total() , '</span>';

                    echo '</div>';

                    echo '<div class="ut-btn-group ut-btn-group-center">';

                        if( $location == 'header' ) {

                            // Primary Skin View Cart Button
                            $view_cart_button = ut_return_header_config('ut_navigation_ps_shopping_cart_view_cart_button');
                            $view_cart_button['button_plain_link'] = esc_url( wc_get_cart_url() );
                            $view_cart_button['button_size'] = 'bklyn-btn-mini';
                            $view_cart_button['class'] = 'bklyn-btn-header-cart';
                            $this->create_button( esc_html__( 'View Cart', 'unitedthemes' ), $view_cart_button, $location );

                            // Primary Skin Checkout Button
                            $checkout_button = ut_return_header_config('ut_navigation_ps_shopping_cart_checkout_button');
                            $checkout_button['button_plain_link'] = esc_url( wc_get_checkout_url() );
                            $checkout_button['button_size'] = 'bklyn-btn-mini';
                            $checkout_button['class'] = 'bklyn-btn-header-cart';
                            $this->create_button( esc_html__( 'Checkout', 'unitedthemes' ), $checkout_button, $location );

                        } else {

                            // View Cart Button
                            $view_cart_button = ut_return_header_config('ut_top_header_shopping_cart_view_cart_button');
                            $view_cart_button['button_plain_link'] = esc_url( wc_get_cart_url() );
                            $view_cart_button['button_size'] = 'bklyn-btn-mini';
                            $view_cart_button['class'] = 'bklyn-btn-header-cart';
                            $this->create_button( esc_html__( 'View Cart', 'unitedthemes' ), $view_cart_button, $location );

                            // Checkout Button
                            $checkout_button = ut_return_header_config('ut_top_header_shopping_cart_checkout_button');
                            $checkout_button['button_plain_link'] = esc_url( wc_get_checkout_url() );
                            $checkout_button['button_size'] = 'bklyn-btn-mini';
                            $checkout_button['class'] = 'bklyn-btn-header-cart';
                            $this->create_button( esc_html__( 'Checkout', 'unitedthemes' ), $checkout_button, $location );                            

                        }

                    echo '</div>';

                echo '</li>';
            
            echo '</ul>';
            
        }
        
        
        /** 
		 * Woocommerce Shopping Cart View Items
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
        public function woo_shopping_cart_view_items() {
            
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                    echo '<li class="ut-header-mini-cart-item clearfix">';

                        echo '<a class="ut-header-mini-cart-link" href="' , esc_url( $product_permalink ) , '">';

                            echo '<figure class="ut-header-mini-cart-item-img">';

                                echo $thumbnail;

                            echo '</figure>';

                            echo '<div class="ut-header-mini-cart-item-description">';

                                echo $product_name;
                                echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key );

                            echo '</div>';

                        echo '</a>';

                        echo '<a class="ut-remove-header-cart-item" data-cart-item-key="' , $cart_item_key , '"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';    

                    echo '</li>';

                }       

            }            
            
        }
        
		/** 
		 * Woocommerce User Account
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function woo_user_account( $location = 'header' ) {

			if( !is_woocommerce_activated() ) {
				return;
			} 
			
			$account_page = get_option( 'woocommerce_myaccount_page_id' );
			
            // default class
            $classes = array('ut-header-account');
            
            // if located in header it acts like a menu item
            if( $location == 'header' ) {
            
                $classes[] = 'ut-main-navigation-link';    
                
            } ?>

				<a class="<?php echo implode(' ', $classes ); ?>" href="<?php echo get_permalink( $account_page ); ?>" title="<?php esc_html_e( 'View your account', 'unitedthemes' ); ?>">
					
                    <?php if( $location == 'header' ) : ?>
                    
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    
                    <?php else: ?>
                    
                        <i class="fa fa-user-o" aria-hidden="true"></i><span class="ut-woocommerce-account-text"><?php $this->woo_user_account_text( $location ) ; ?></span>
                    
                    <?php endif; ?>
                    
				</a>

			<?php
			
		}
		
		
		/** 
		 * Woocommerce User Account
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function woo_user_account_text( $location ) {
		  
            esc_html_e( 'My Account', 'unitedthemes' );				
			
		}
		
        
        /** 
		 * WPML Language Switch Top Header
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function wpml_language_switch_top_header() {
			
            $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );            
            
            if ( !empty( $languages ) ) {
                
                echo '<div class="ut-top-header-sub-menu ut-wpml-language-switch ut-wpml-language-switch-top-header ut-wpml-language-switch-style-default clearfix">';
                
                foreach( $languages as $language ) {
                    
                    if ( $language['active'] ) {
                            
                        echo '<a class="ut-wpml-language-switch-active" href="' . esc_url( $language['url'] ) . '"><img class="ut-wpml-language-switch-flag" src="' . esc_url( $language['country_flag_url'] ) . '" alt="' . esc_attr( $language['language_code'] ) . '" />';

                            echo '<span class="ut-wpml-language-switch-name hide-on-tablet hide-on-mobile">' . $language['translated_name'] . '</span><span class="ut-wpml-language-switch-code hide-on-tablet hide-on-mobile">(' . $language['code'] . ')</span>';
                        
                        echo '</a>';

                        echo '<ul>';

                            foreach( $languages as $language ) {

                                if ( !$language['active'] ) {

                                    echo '<li>';

                                        echo '<a href="' . esc_url( $language['url'] ) . '"><img class="ut-wpml-language-switch-flag" src="' . esc_url( $language['country_flag_url'] ) . '" alt="' . esc_attr( $language['language_code'] ) . '" />';

                                            echo '<span class="ut-wpml-language-switch-name">' . $language['translated_name'] . '</span><span class="ut-wpml-language-switch-code">(' . $language['code'] . ')</span>';
                                    
                                        echo '</a>';

                                    echo '</li>';

                                }                        

                            }

                        echo '</ul>';                        
                        
                    }                        
                    
                }
                
                echo '</div>';
                
            }			
			
		}
        
        
        /** 
		 * WPML Language Switch Header
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function wpml_language_switch_header() {
			
            $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );            
            
            if ( !empty( $languages ) ) {
            
                ob_start();
                
                foreach( $languages as $language ) {
                    
                    if ( $language['active'] ) {
                            
                        echo '<a class="ut-main-navigation-link ut-wpml-language-switch-active" href="' . esc_url( $language['url'] ) . '"><img class="ut-wpml-language-switch-flag" src="' . esc_url( $language['country_flag_url'] ) . '" alt="' . esc_attr( $language['language_code'] ) . '" />';

                            echo '<span class="ut-header-remove-text">' . $language['translated_name'] . '</span><span class="ut-wpml-language-switch-code hide-on-tablet hide-on-mobile">(' . $language['code'] . ')</span>';
                        
                        echo '</a>';
                        
                        if( count( $languages ) > 1 ) {
                        
                            echo '<ul class="sub-menu">';

                                foreach( $languages as $language ) {

                                    if ( !$language['active'] ) {

                                        echo '<li>';

                                            echo '<a href="' . esc_url( $language['url'] ) . '"><img class="ut-wpml-language-switch-flag" src="' . esc_url( $language['country_flag_url'] ) . '" alt="' . esc_attr( $language['language_code'] ) . '" />';

                                                echo '<span><span class="ut-wpml-language-switch-name">' . $language['translated_name'] . '</span><span class="ut-wpml-language-switch-code">(' . $language['code'] . ')</span></span>';

                                            echo '</a>';

                                        echo '</li>';

                                    }                        

                                }

                            echo '</ul>';
                            
                        }
                        
                    }                        
                    
                }
                
            }
			
			return ob_get_clean();
			
		}
        
        
		/** 
		 * Overlay Search Field
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function create_search_field() {
			
			if( !$this->header_search ) {
				return;
			}		
			
			$ut_overlay_search_info_text = ot_get_option( 'ut_overlay_search_info_text', esc_html__( 'Hit enter to search or ESC to close', 'unitedthemes' ) ); ?>
			
			<div id="ut-header-search" style="visibility: hidden;">
				
                <?php $this->transform_button( 'ut-header-search-close', 'ut-header-search-close-wrap' ); ?>

				<form role="search" method="get" id="ut-header-searchform" action="<?php echo home_url( '/' ); ?>'">

					<input autocomplete="off" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
					<h4 class="ut-header-search-info"><?php echo $ut_overlay_search_info_text; ?></h4>		

				</form>
				
				<?php if( ot_get_option( 'ut_overlay_search_related_boxes', 'on' ) == 'on' ) : ?>
				
				<div class="ut-header-search-related">
					
					<div id="ut-header-search-suggestion-left" class="ut-header-search-suggestion">
						
						<?php if( ot_get_option( 'ut_overlay_search_left_suggestion_box_headline' ) ) : ?>
						
							<h3><?php echo ot_get_option( 'ut_overlay_search_left_suggestion_box_headline' ); ?></h3>
						
						<?php endif; ?>
						
						<?php // left box content
			
						$suggestion_box_content = ot_get_option( 'ut_overlay_search_left_suggestion_box_content' );
			
						if( $suggestion_box_content ) : ?>
						
							<p><?php echo do_shortcode( nl2br( $suggestion_box_content ) ); ?></p>
						
						<?php endif; ?>
						
					</div>
					
					<div id="ut-header-search-suggestion-right" class="ut-header-search-suggestion">
						
						<?php if( ot_get_option( 'ut_overlay_search_right_suggestion_box_headline' ) ) : ?>
						
							<h3>
								<?php echo ot_get_option( 'ut_overlay_search_right_suggestion_box_headline' ); ?>
							</h3>
						
						<?php endif; ?>
						
						<?php // right box content
			
						$suggestion_box_content = ot_get_option( 'ut_overlay_search_right_suggestion_box_content' );
			
						if( $suggestion_box_content ) : ?>
						
							<p><?php echo do_shortcode( nl2br( $suggestion_box_content ) ); ?></p>
						
						<?php endif; ?>
						
					</div>

				</div>										
				
				<?php endif; ?>
				
			</div>
			
			<?php			
			
		}
		
		
		/** 
		 * Search Icon
		 *
		 * @return    array
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function create_search_icon( $class, $location = 'top-header' ) {
						
			echo '<a class="', esc_attr( $class ) , '" href="#">';			
            
                echo '<i class="fa fa-search" aria-hidden="true"></i>';
            
            echo '</a>';
			
		}

		
		/** 
		 * Prints a Placeholder for Header Animation Purposes
		 *
		 * @return    mixed
		 *
		 * @access    public
		 * @since     4.5.4
		 * @version   1.0.0
		 */
        
		public function create_header_placeholder() {

			if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' && ut_return_header_config( 'ut_navigation_scroll_position', 'floating' ) == 'floating' ) {

				// header is hidden by default ( default skins )
				if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ( ut_return_header_config('ut_navigation_state' , 'off') == 'off' || ut_return_header_config('ut_navigation_state' , 'off') == 'on_transparent' || ut_return_header_config('ut_navigation_on_hero' , 'on') == 'on' ) ) {
					return;	
				}

				// header is hidden by default ( custom skins )
				if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'off' ) ) {
					return;	
				}
                
                // header is force to display on hero ( custom skins )
				if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ( ut_return_header_config('ut_navigation_on_hero' , 'on') == 'on' ) ) {
					return;	
				}
                
				$skin = 'ut-header-placeholder-custom';

				if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) {
					$skin = 'ut-placeholder-light';
				}

				if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' ) {
					$skin = 'ut-placeholder-dark';
				}

				echo '<div id="ut-header-placeholder" class="' , $skin , '"></div>';

			}    

		}
		
		
		/**
         * Turn an array of classes into a string
         *
         * @access public
         */ 
        
        public function top_header_class() {
            
			$classes = array();
			
			$classes[] = 'ut-top-header-' . ut_return_header_config( 'ut_top_header_font_size', 'small' );
			
            if( ut_return_header_config( 'ut_top_header_width', 'header' ) == 'header' ) {                
                
                $classes[] = 'ut-top-header-' . ut_return_header_config('ut_navigation_width' , 'centered');                
                
            } else {
                
                $classes[] = 'ut-top-header-' . ut_return_header_config( 'ut_top_header_width', 'fullwidth' );
                
            }
            
            // optional border
            $ut_top_header_border_bottom_style = ut_return_header_config( 'ut_top_header_border_bottom_style' );
            
            if( !empty( $ut_top_header_border_bottom_style['border-bottom-style'] ) && $ut_top_header_border_bottom_style['border-bottom-style'] != 'none' ) {
                $classes[] = 'ut-top-header-has-border';
            }
            
            $classes[] = ut_return_header_config( 'ut_top_header_reverse', 'off' ) == 'on' ? 'ut-top-header-reverse' : '';
			$classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_top_header_width', 'fullwidth' ) == 'fullwidth' ? 'ut-flush' : '';
            
            // responsive
            $classes[] = 'hide-on-tablet';
            $classes[] = 'hide-on-mobile';            
            
            return implode( " ", $classes );
        
        }
		
		
		/** 
		 * Header Classes
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		function header_class( $class = '' ) {
        
			// class array
			$classes   = array();
			$classes[] = 'ha-header';
			$classes[] = $class;

			// header scroll position
			$classes[] = ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' ? 'ut-header-floating' : 'ut-header-fixed';

			// site border settings
			$classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';

			// header width
			$classes[] = ut_return_header_config('ut_navigation_width' , 'centered');
			$classes[] = ut_page_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
			$classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush' : '';
            $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'logo_only' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush-logo-only' : '';
            
            // mobile logo flush
            $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) != 'no' && ut_return_header_config( 'ut_site_logo_responsive_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush-logo-mobile' : '';
            
            
			if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {

				if( apply_filters( 'ut_show_hero', false ) ) {

					$classes[] = 'ut-primary-custom-skin';

				} else {

					if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) {

						$classes[] = 'ut-secondary-custom-skin';

					} else {

						$classes[] = 'ut-primary-custom-skin';

					}

				}

				if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_customskin_state', 'off' ) == 'off' ) {

					$classes[] = 'ha-header-hide';

				}

			} else {

				// border
				$classes[] = ut_return_header_config( 'ut_navigation_state') == 'on_transparent' && ut_return_header_config( 'ut_navigation_transparent_border' ) == 'on' ?  'ut-header-has-border' : '';

				// transparent or skin
				$classes[] = ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'on_transparent' && apply_filters( 'ut_show_hero', false ) ? 'ha-transparent' : ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );
                
                if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                    $classes[] = 'ut-navigation-style-on';    
                }
                
                // hidden header    
                if( apply_filters( 'ut_show_hero', false ) && ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'off' ) {
                    $classes[] = 'ha-header-hide';
                }

			}
            
			// clean up 
			$classes = array_map( 'esc_attr', $classes );
			$classes = array_unique( $classes );

			// output                
			echo implode( ' ' , $classes );

		}
		
		
        /** 
		 * Header Data Primary Skin
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		function header_primary_skin_data() {
            
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {
                
                // active hero
                if( apply_filters( 'ut_show_hero', false ) ) {

					$primary_skin = 'ut-primary-custom-skin';

				} else {
                    
                    // on switch skin
					if( ut_return_header_config( 'ut_navigation_customskin_state' , 'off' ) == 'on_switch' ) {

						$primary_skin = 'ut-secondary-custom-skin';

					} else {

						$primary_skin = 'ut-primary-custom-skin';

					}

				}
                
            } else {
                
                $primary_skin = ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'on_transparent' && apply_filters( 'ut_show_hero', false ) ? 'ha-transparent' : ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );
                
            }
            
            return $primary_skin;
            
        }
        
        
        
        /** 
		 * Header Data Secondary Skin
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		function header_secondary_skin_data() {
            
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {
            
                if( ut_return_header_config( 'ut_navigation_customskin_state' , 'off' ) == 'off' ) {

                    $secondary_skin = 'ut-primary-custom-skin';        

                } else {

                    $secondary_skin = 'ut-secondary-custom-skin';

                }
                
            } else {
                
                $secondary_skin = ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );
                
            }
            
            return $secondary_skin;
            
        }
        
        
        
		/** 
		 * Create Link 
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		public function create_link( $atitle, $link, $icon = false ) {
      
			if( function_exists('vc_build_link') && $link ) {

				$link = vc_build_link( $link );

				$target = !empty( $link['target'] ) ? $link['target'] : '_self';
				$title  = !empty( $link['title'] )  ? $link['title'] : '';
				$rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
				$link   = !empty( $link['url'] )    ? $link['url'] : '';

				if( !empty( $link ) ) {                        
                    
                    if( $icon ) {
                        
                        return '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '><i class="' . $icon . '"></i>' . $atitle . '</a>';
                        
                    } else {
                        
                        return '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '>' . $atitle . '</a>';
                        
                    }

				}

			}        
            
            if( $icon ) {
                
                return '<i class="' . $icon . '"></i>' . $atitle;
                
            }
            
            return $atitle;			

		}
		
        
        /** 
		 * Create Custom Field Link ( Header Module )
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		public function create_custom_field_link( $atitle, $link, $icon = false ) {
      
			if( function_exists('vc_build_link') && $link ) {

				$link = vc_build_link( $link );

				$target = !empty( $link['target'] ) ? $link['target'] : '_self';
				$title  = !empty( $link['title'] )  ? $link['title'] : '';
				$rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
				$link   = !empty( $link['url'] )    ? $link['url'] : '';

				if( !empty( $link ) ) {                        
                    
                    if( $icon ) {
                                            
                        return '<a class="ut-main-navigation-link" title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '><i class="' . $icon . '"></i><span>' . $atitle . '</span></a>';
                        
                    } else {
                     
                        return '<a class="ut-main-navigation-link" title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '><span>' . $atitle . '</span></a>';
                    
                    }

				}

			}        
            
            if( $icon ) {            
            
			     return '<a class="ut-main-navigation-link ut-deactivated-link" href="#"><i class="' . $icon . '"></i>' . $atitle . '</a>';
                
            } else {
            
                return '<a class="ut-main-navigation-link ut-deactivated-link" href="#">' . $atitle . '</a>';
                
            }

		}
        
		
		/**
         * Create List of Social Icons
         *
         * @access public
         */
        
        public function create_social_icons( $location = 'top', $align = 'left' ) {
            
			// assign global social profile first
			$social = !empty( $this->global_social ) && is_array( $this->global_social ) ? $this->global_social : '';
			
			// overwrite if top header has custom profiles
			$social = ( $location == 'top' ) && !empty( $this->top_social ) && is_array( $this->top_social ) ? $this->top_social : $social;
			
			// no social links set
			if( empty( $social ) ) {
				
                return;				
                
			}
			
            // extra li class for border styles
            $li_class = ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' && $location == 'top' ? 'ut-top-header-border-separator' : '';
            
            // flip social icons because of alignment
            if( $location == 'top' && $align == 'right' ) { $social = array_reverse( $social ); }            
            
            ob_start();
            
                echo '<ul class="fa-ul clearfix">';

                    foreach( $social as $icon => $value ) {

                        $link  = !empty( $value["link"] )  ? esc_url( $value["link"] ) : '#' ;
                        $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

                        echo '<li class="' . esc_attr( $li_class ) . '">';
                            
                            echo '<a ' , $title , ' target="_blank" href="' , $link , '"><i class="fa ' , $value["icon"] , '"></i></a>';
                        
                        echo '</li>';

                    }

                echo '</ul>';
            
            return ob_get_clean();
        
        }
        
        
        /**
         * Create List of Social Icons for Header Toolbar
         *
         * @access public
         */
        
        public function create_header_social_icons( $location ) {
            
			// assign global social profile first
			$social = !empty( $this->global_social ) && is_array( $this->global_social ) ? $this->global_social : '';
			
			// no social links set
			if( empty( $social ) ) {
                
                return '&nbsp;';				
                
			}
			
            // class array
            $classes = array('ut-horizontal-navigation');
                
            // navigation style  
            $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
            
            // animation line position
            if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                
                $classes[] = 'ut-navigation-style-animation-line-' . ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' );
                
                if( ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' ) == 'middle' ) {
                    
                    $classes = array_diff( $classes, array( 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' ) ) );
                    
                }
                
            }  
            
            ob_start();
                
                echo '<div id="ut-header-' , $location , '-extra-module" class="' , implode(" " , $classes ) , '">';
            
                    echo '<ul class="fa-ul ut-header-extra-module-company-social-list ut-navigation-menu menu">';

                    foreach( $social as $icon => $value ) {

                        $link  = !empty( $value["link"] )  ? esc_url( $value["link"] ) : '#' ;
                        $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

                        echo '<li>';
                            
                            echo '<a ' , $title , ' href="' , esc_url( $link ) , '" target="_blank" class="ut-main-navigation-link">';
                                
                                echo '<i class="fa ' , $value["icon"] , '"></i>';
                                                        
                            echo '</a>';                        
                        
                        echo '</li>';

                    }

                    echo '</ul>';
            
                echo '</div>';
            
            return ob_get_clean();
        
        }
        
        
        /**
         * Create Top Header Menu
         *
         * @access public
         */ 
        
        public function create_top_header_menu( $location = 'left' ) {
			
            $menu = ut_return_header_config( 'ut_top_header_' . $location . '_menu' );
            
            if( $menu ) {
            
                $top_header_menu = array(
                    'echo'              => false,
                    'menu'              => $menu,
                    'menu_class'        => 'menu clearfix',
                    'container'         => 'nav',
                    'container_id'      => 'ut-top-header-navigation',
                    'items_wrap'        => '<ul id="%1$s" class="ut-top-header-navigation %2$s">%3$s</ul>',
                    'depth'             => 2,
                    'walker'            => new UT_Top_Header_Menu()
                );

                return wp_nav_menu( $top_header_menu );
            
            }
            
            return;
			
		}

        
		/**
         * Create Top Header Custom Fields
         *
         * @access public
         */ 
         
        public function create_top_header_custom_fields( $location = 'left' ) {
			
            // extra li class for border styles
            $li_class = ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' ? 'ut-top-header-border-separator' : '';
            
            // get custom fields depending on location
			$custom_fields = ut_return_header_config( 'ut_top_header_' . $location . '_extra_fields' ); 

			if( !empty( $custom_fields ) ) { 
            
                // flip array because of align    
                if( $location == 'right' ) { 
                    $custom_fields = array_reverse( $custom_fields ); 
                } 
                
                ob_start();

                    echo '<ul class="fa-ul clearfix">';

                    foreach( $custom_fields as $custom_field ) {

                        if( !empty( $custom_field['title'] ) ) { 

                            echo '<li class="' . esc_attr( $li_class ) . '">';
                                
                                $link = !empty( $custom_field['link'] ) ? $custom_field['link'] : '';    

                                if( !empty( $custom_field['icon'] ) ) :

                                    echo $this->create_link( $custom_field['title'], $link, $custom_field['icon'] );

                                else : 

                                    echo $this->create_link( $custom_field['title'], $link );

                               endif;

                            echo '</li>';

                        }

                    }

                    echo '</ul>';
        
                return ob_get_clean();

            } 
            
            return;            
			
		}
		
		
		/**
         * Create Top Header Phone and Email ( Theme Default )
         *
         * @access public
         */ 
		
		public function create_top_header_phone_and_email( $location = 'left' ) {
			
            // extra li class for border styles
            $li_class = ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' ? 'ut-top-header-border-separator' : '';
            
			if( ut_return_header_config('ut_top_header_email') || ut_return_header_config('ut_top_header_phone') ) {
                
                ob_start();
                
                    echo '<ul class="fa-ul clearfix">';

                    if( $location == 'left' ) {

                        if( ut_return_header_config('ut_top_header_phone') ) {

                            echo '<li class="' . esc_attr( $li_class ) . '"><i class="fa fa-phone"></i>';
                                echo ut_return_header_config('ut_top_header_phone');
                            echo '</li>';

                        }

                        if( ut_return_header_config('ut_top_header_email') ) {

                            echo '<li class="' . esc_attr( $li_class ) . '">';                        
                                echo '<a href="mailto:' , ut_return_header_config('ut_top_header_email') , '">';
                                    echo '<i class="fa fa-envelope-o"></i>' . ut_return_header_config('ut_top_header_email');						
                                echo '</a>';						
                            echo '</li>';						

                        }

                    } else {

                        if( ut_return_header_config('ut_top_header_email') ) {

                            echo '<li class="' . esc_attr( $li_class ) . '">';                        
                                echo '<a href="mailto:' , ut_return_header_config('ut_top_header_email') , '">';
                                    echo '<i class="fa fa-envelope-o"></i>' . ut_return_header_config('ut_top_header_email');						
                                echo '</a>';						
                            echo '</li>';						

                        }

                        if( ut_return_header_config('ut_top_header_phone') ) {

                            echo '<li class="' . esc_attr( $li_class ) . '"><i class="fa fa-phone"></i>';
                                echo ut_return_header_config('ut_top_header_phone');
                            echo '</li>';

                        }

                    }

                    echo '</ul>';
                
                return ob_get_clean();

            }
            
            return;
			
		}
				
		
		/**
         * Create Header Toolbar
         *
         * @access public
         */
		
		public function create_top_header_toolbar( $top_header_toolbar, $location = 'left', $classes = array() ) {
			
            if( !empty( $top_header_toolbar ) && is_array( $top_header_toolbar ) ) {
			 
                // extra li class for border styles
                $li_class = ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' ? 'ut-top-header-border-separator' : '';
                
                // flip array because of align    
                if( $location == 'right' ) { 
                    
                    $top_header_toolbar = array_reverse( $top_header_toolbar ); 
                    
                }
                
                ob_start();
                
                    // start toolbar
                    echo '<ul class="ut-top-header-extra-module-toolbar ' , implode( " ", $classes ) , ' clearfix">';

                    // loop trough 
                    foreach( $top_header_toolbar as $key => $tool ) {

                        switch ( $key ) {

                            case "shopping-cart":
                                
                                if( is_woocommerce_activated() ) {
                                
                                    echo '<li class="ut-top-header-has-submenu ' . esc_attr( $li_class ) . '">';
                                    echo $this->woo_shopping_cart_top_header();
                                
                                }                                

                            break;	

                            case "user":
                                
                                if( is_woocommerce_activated() ) {
                                
                                    echo '<li class="' . esc_attr( $li_class ) . '">';
                                    echo $this->woo_user_account( 'top-header' );
                                    
                                }

                            break;	

                            case "search":

                                echo '<li class="ut-top-header-search ' . esc_attr( $li_class ) . '">';
                                $this->header_search = true;
                                $this->create_search_icon( 'ut-top-header-search-trigger', 'top-header' );

                            break;

                            case "language":
                                
                                if( ut_wpml_activated() ) {
                                
                                    echo '<li class="ut-top-header-wpml-language-switch ut-top-header-has-submenu ' . esc_attr( $li_class ) . '">';
                                    echo $this->wpml_language_switch_top_header();
                                    
                                }

                            break;  


                        }

                        echo '</li>';

                    }

                    echo '</ul>';
                
                return ob_get_clean();
				
			}
            
            return;
            
		}
		
        
		/**
         * Create Top Header Left
         *
         * @access public
         */
		
		public function create_top_header_left() {
			
			switch ( $this->top_header_left ) {
					
				case "company_social":
					
					return $this->create_social_icons('top', 'left');
					
				break;
					
				case "company_contact":
					
					return $this->create_top_header_phone_and_email('left');
					
				break;
					
				case "custom_fields":
					
					return $this->create_top_header_custom_fields('left');
					
				break;
					
				case "custom_menu":
				
					return $this->create_top_header_menu('left');
					
				break;
					
				case "toolbar":
					
					return $this->create_top_header_toolbar( ut_return_header_config( 'ut_top_header_left_toolbar' ), 'left' );
					
				break;
					
				case "top_header_no_content":
                    
				break;
					
				default: return $this->create_top_header_phone_and_email('left');
					
					
			}

			
		}
		
		
		/**
         * Create Top Header Right
         *
         * @access public
         */
		
		public function create_top_header_right() {
			
			switch ( $this->top_header_right ) {
					
				case "company_social":
					
					return $this->create_social_icons('top', 'right');
					
				break;
					
				case "company_contact":
					
					return $this->create_top_header_phone_and_email('right');
					
				break;
					
				case "custom_fields":
					
					return $this->create_top_header_custom_fields('right');
					
				break;
					
				case "custom_menu":
					
					return $this->create_top_header_menu('right');
					
				break;
					
				case "toolbar":
					
					return $this->create_top_header_toolbar( ut_return_header_config( 'ut_top_header_right_toolbar' ), 'right' );
					
				break;
					
				case "top_header_no_content":
					
				break;
					
				default: return $this->create_social_icons('top', 'right');	
					
					
			}
			
			
		}
		
        
        /**
         * Top Header Area Classes 
         *
         * @access public
         */
        
        public function create_top_header_area_classes( $location = 'left', $classes = array() ) {
            
            // top header location
            $top_header_location = 'top_header_' . $location;
            
            // content type class
            $classes[] = 'ut-' . str_replace('_', '-', $this->$top_header_location );
            
            // extra classes for responsive
            if( $this->$top_header_location == 'custom_fields' || $this->$top_header_location == 'custom_menu' ) {
               
                $classes[] = 'hide-on-mobile';
                
            }
            
            return implode( " ", array_unique( $classes ) );
            
        }
        
        
		/**
         * Create Top Header 
         *
         * @access public
         */
        
		public function create_top_header() {
			
			if( ut_page_option( 'ut_top_header', 'hide' ) == 'hide' ) { 
				return; 
			}
			
            $this->top_header_left  = ut_return_header_config( 'ut_top_header_left_content_type', 'company_contact' );
            $this->top_header_right = ut_return_header_config( 'ut_top_header_right_content_type', 'company_social' );
            
            $left_classes = $right_classes = array();
            
			echo '<div id="ut-top-header" class="' , $this->top_header_class() , ' clearfix">';
			
                echo '<div class="ut-header-inner clearfix">';
			     
                    // check if left content has been set
                    $left_classes[] = !$this->create_top_header_left() ? 'ut-top-header-no-content' : '';
            
					echo '<div id="ut-top-header-left" class="' . $this->create_top_header_area_classes( 'left', $left_classes ) . '">';
                        
						echo $this->create_top_header_left();
			
					echo '</div>';
            
                    // check if right content has been set    
                    $right_classes[] = !$this->create_top_header_right() ? 'ut-top-header-no-content' : '';
            
					echo '<div id="ut-top-header-right" class="' . $this->create_top_header_area_classes( 'right', $right_classes ) . '">';
			
						echo $this->create_top_header_right();
						
					echo '</div>';
			
				echo '</div>';
			
			echo '</div>';
			
			
		}		
		
		
        /** 
		 * Site Logo Mobile Grid Size
		 *
		 * @return    string attr string
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
		public function site_logo_mobile_grid() {
            
            if( is_woocommerce_activated() ) {
                
                return 'mobile-grid-50';
                
            } else {
            
                return 'mobile-grid-70';
                
            }
            
        }
        
        
		/** 
		 * Prints a Logo 
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function create_site_logo( $class = '' ) {

			$site_logo 			 = ut_return_logo_config( 'ut_site_logo' );
			$site_logo_alternate = ut_return_logo_config( 'ut_site_logo_alt', $site_logo );

            $logo_class = array();

            if( ut_return_header_config( 'ut_site_logo_distortion', 'off' ) != 'off' ) {

                $logo_class[] = 'ut-simple-glitch-text-permanent';
                $logo_class[] = 'ut-simple-glitch-text-' . ut_return_header_config( 'ut_site_logo_distortion', 'off' ) . '-permanent';

            }

            // temporary fallback since get theme mod does not return ?!?
            $site_logo_alternate = empty( $site_logo_alternate ) ? $site_logo : $site_logo_alternate;
            
			if( !apply_filters( 'ut_show_hero', false ) ) {

				if( $site_logo_alternate ) {

					$site_logo = $site_logo_alternate;

				}

			} 

			if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) { 

				$sitelogo = $site_logo_alternate;

			} ?>

			<?php if( $site_logo ) : ?>

				<div class="site-logo <?php echo $this->style == 'style-9' && !empty( $class ) ? $class : ''; ?>">

                    <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' ) : ?><div class="ut-site-logo-background"><?php endif; ?>

                    <a class="<?php echo implode(' ', $logo_class ); ?>" href="<?php echo esc_url( apply_filters( 'ut_site_logo_url', home_url( '/' ) ) ); ?>" rel="home">

						<img data-original-logo="<?php echo esc_url( $site_logo ); ?>" data-alternate-logo="<?php echo esc_url( $site_logo_alternate ); ?>" src="<?php echo esc_url( $site_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

					</a>

                    <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' ) : ?></div><?php endif; ?>

				</div>

			<?php else :

                $data_logo_font_size = '';

                if( defined('UT_SHORTCODES_VERSION') ) {

                    $font_size = ut_get_theme_options_font_setting( 'site_logo','font-size', "16" );
	                $data_logo_font_size = 'data-font-size="' . esc_attr( $font_size ) . '"';

                } ?>

				<div class="site-logo">

                    <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' ) : ?><div class="ut-site-logo-background"><?php endif; ?>

					<h1 class="logo <?php echo implode(' ', $logo_class ); ?>"><a data-responsive-font="site_logo" href="<?php echo esc_url( apply_filters( 'ut_site_logo_url', home_url( '/' ) ) ); ?>" rel="home" <?php echo $data_logo_font_size; ?>>

                        <?php bloginfo( 'name' ); ?></a>

                    </h1>

                    <?php if( ut_return_header_config( 'ut_site_logo_background', 'off' ) == 'on' ) : ?></div><?php endif; ?>

				</div>

			<?php endif;


		}
				
        
        /** 
		 * Creates a separator data attribute for headers with 2 rows of content
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
        
		public function data_header_area_separator() {
            
            if( ut_return_header_config( 'ut_header_separate_upper_lower', 'on' ) == 'on' ) {
				
                return 'on';
                                
			}
            
            return 'off';
            
        }
        
        
		/** 
		 * Creates a separator for headers with 2 rows of content
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
		public function create_header_area_separator() {
			
			echo '<div id="header-section-area-separator">';
			
                echo '<div class="grid-100 hide-on-tablet hide-on-mobile">';

                    echo '<div class="ut-header-area-separator"></div>';

                echo '</div>';				
			
			echo '</div>';
			
		}
		
		
		/**
         * Create Header Toolbar
         *
         * @access public
         */
		public function create_header_toolbar( $location = 'primary'  ) {
			
			$header_toolbar = ut_return_header_config( 'ut_header_' . $location . '_toolbar' );
			
			if( !empty( $header_toolbar ) && is_array( $header_toolbar ) ) {
				
                $classes = array('ut-horizontal-navigation');
                
                // navigation style  
                $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
                
                // navigation animation
                if( ut_return_header_config( 'ut_navigation_submenu_animation', 'yes' ) == 'yes' ) {
                    $classes[] = 'ut-navigation-with-animation';
                }
                
                echo '<div id="ut-header-' . $location . '-extra-module" class="' , implode(" ", $classes) , '">';
                
                    echo '<ul class="ut-navigation-menu menu ut-header-extra-module-toolbar">';

                    // loop trough 
                    foreach( $header_toolbar as $key => $tool ) {
                        
                        switch ( $key ) {

                            case "shopping-cart":
                                
                                echo '<li class="ut-menu-item-lvl-0 menu-item-has-children ut-header-mini-cart">';
                                echo $this->woo_shopping_cart_header();

                            break;	

                            case "user":

                                echo '<li class="ut-menu-item-lvl-0">';
                                echo $this->woo_user_account();

                            break;	

                            case "search":

                                echo '<li class="ut-menu-item-lvl-0">';
                                $this->header_search = true;
                                $this->create_search_icon( 'ut-main-navigation-link ut-header-search-trigger', 'header' );

                            break;

                            case "bars":

                                echo '<li class="ut-menu-item-lvl-0">';
                                $this->overlay_navigation = true;
                                $this->transform_button( 'ut-open-overlay-menu', 'ut-hamburger-wrap-overlay', 'ut-open-overlay-menu' );

                            break;

                            case "language":
                                
                                if( ut_wpml_activated() ) {
                                
                                    echo '<li class="ut-menu-item-lvl-0 menu-item-has-children">';
                                    echo $this->wpml_language_switch_header();
                                     
                                }

                            break;    

                        }

                        echo '</li>';

                    }

                    echo '</ul>';
                
                echo '</div>';
				
			} else {
                
                echo '&nbsp;';
                
            }
			
			
		}
		
        
		/**
         * Create Header Custom Fields
         *
         * @access public
         */ 
        
        public function create_header_custom_fields( $location = 'primary' ) {
			
            if( $location == 'primary' || $location == 'tertiary' ) {
                
                if( $this->style == 'style-2' ) {
                    
                    $custom_fields = ut_return_header_config('ut_header_' . $location . '_extra_fields_max_1');                     
                                    
                } else {
                                        
                    $custom_fields = ut_return_header_config('ut_header_' . $location . '_extra_fields_max_2');
                    
                }                
                
            } else {
                
                $custom_fields = ut_return_header_config('ut_header_' . $location . '_extra_fields'); 
                
            }
            
            // class array
            $classes = array('ut-horizontal-navigation');
                
            // navigation style  
            $classes[] = 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' );
            
            // animation line position
            if( ut_return_header_config( 'ut_navigation_style', 'separator' ) == 'animation-line' ) {
                
                $classes[] = 'ut-navigation-style-animation-line-' . ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' );
                
                if( ut_return_header_config( 'ut_navigation_animation_line_position', 'bottom' ) == 'middle' ) {
                    
                    $classes = array_diff( $classes, array( 'ut-navigation-style-' . ut_return_header_config( 'ut_navigation_style', 'separator' ) ) );
                    
                }
                
            }  
            
			if( !empty( $custom_fields ) ) : ?>	
                
                <div id="ut-header-<?php echo $location; ?>-extra-module" class="<?php echo implode(" ", $classes); ?>">

                    <ul class="fa-ul ut-navigation-menu ut-header-extra-module-custom-fields">

                        <?php foreach( $custom_fields as $custom_field ) : ?>

                            <li>

                            <?php 
            
                            $link = !empty( $custom_field['link'] ) ? $custom_field['link'] : '';    
            
                            if( !empty( $custom_field['icon'] ) ) : ?>

                                <?php echo $this->create_custom_field_link( $custom_field['title'], $link, $custom_field['icon'] ); ?>
                                
                            <?php else : ?>    
                                
                                <?php echo $this->create_custom_field_link( $custom_field['title'], $link ); ?>
                                
                            <?php endif; ?>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>    
                    
			<?php 
            
            else : echo '&nbsp;';            
            
            endif;
			
		}
		
		
		/** 
		 * Create Button 
		 *
		 * @return    string
		 *
		 * @access    public
		 * @since     1.0.0
		 */
        
		public function create_button( $title, $config, $location = 'header' ) {
      	
			if( class_exists("UT_BTN") && $config ) {
				
                if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' ) {
                    
                    $config['button_text_color'] 	   = !empty( $config['button_text_color'] ) ? $config['button_text_color'] : '#FFFFFF';
                    $config['button_text_color_hover'] = !empty( $config['button_text_color_hover'] ) ? $config['button_text_color_hover'] : '#131416';
                    $config['button_background'] 	   = !empty( $config['button_background'] ) ? $config['button_background'] : get_option( 'ut_accentcolor' , '#F1C40F' );
                    $config['button_background_hover'] = !empty( $config['button_background_hover'] ) ? $config['button_background_hover'] : '#FFF';
                    
                } else if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) {
                    
                    $config['button_text_color'] 	   = !empty( $config['button_text_color'] ) ? $config['button_text_color'] : '#FFFFFF';
                    $config['button_text_color_hover'] = !empty( $config['button_text_color_hover'] ) ? $config['button_text_color_hover'] : '#FFFFFF';
                    $config['button_background'] 	   = !empty( $config['button_background'] ) ? $config['button_background'] : get_option( 'ut_accentcolor' , '#F1C40F' );
                    $config['button_background_hover'] = !empty( $config['button_background_hover'] ) ? $config['button_background_hover'] : '#151515';
                    
                } else {
                
                    // fallback values
                    $config['button_text_color'] 	   = !empty( $config['button_text_color'] ) ? $config['button_text_color'] : '#FFFFFF';
                    $config['button_text_color_hover'] = !empty( $config['button_text_color_hover'] ) ? $config['button_text_color_hover'] : '#FFFFFF';
                    $config['button_background'] 	   = !empty( $config['button_background'] ) ? $config['button_background'] : get_option( 'ut_accentcolor' , '#F1C40F' );
                    $config['button_background_hover'] = !empty( $config['button_background_hover'] ) ? $config['button_background_hover'] : '#151515';
                
                }
                
                
				// required shortcode atts
				if( !empty( $config['button_border_style'] ) && $config['button_border_style'] != 'none' ) {
					$config['button_custom_border'] = 'yes';
				}
				
				if( !empty( $config['button_icon'] ) ) {
					$config['button_add_icon']  = 'yes';
					$config['button_icon_type'] = 'fontawesome';
				}
				
				// merge spacings
				$spacing = array();
				$directions = array( 'top', 'right', 'bottom', 'left' );
				
				foreach( $directions as $direction ) { 
					
					if( !empty( $config['padding-' . $direction] ) && $config['padding-' . $direction] != 0 ) {
						
						$spacing['padding-' . $direction] = $config['padding-' . $direction];
						
					}
					
					
				}
				
				if( !empty( $spacing ) ) {
				
					$spacing = implode(' ', array_map(
						function ($v, $k) { 

							if( $v != 0 ) {
								return sprintf("%s:%spx !important;", $k, $v); 
							}

						},
						$spacing,
						array_keys( $spacing )
					) );
					
					$config['spacing'] = $spacing;
				
				}
				
				// add button title
				$config['button_text'] = $title;
				
				// add class to config for option exceptions
				if( empty( $config['class'] ) ) {
                    
                    $config['class'] = 'bklyn-btn-' . $location;
                    
                }
                
				// initialize new button class
				$button = new UT_BTN();
				
				// render button 
				echo $button->ut_create_shortcode( $config );
				
				
			}

		}
		
		
		/**
         * Create Header Buttons
         *
         * @access public
         */
        
		public function create_header_buttons( $location = 'primary' ) {
			
            if( $location == 'primary' ) {
                
                if( $this->style == 'style-2' ) {
                    
                    $buttons = ut_return_header_config('ut_header_' . $location . '_extra_buttons_max_1');                     
                                    
                } else {
                                        
                    $buttons = ut_return_header_config('ut_header_' . $location . '_extra_buttons_max_2');
                    
                }                
            
            } elseif( $location == 'tertiary' ) {
                
                $buttons = ut_return_header_config('ut_header_' . $location . '_extra_buttons_max_1');                    
                
            } else {
                
                $buttons = ut_return_header_config('ut_header_' . $location . '_extra_buttons'); 
                
            }
            
			if( !empty( $buttons) && is_array( $buttons ) ) {
				
                echo '<div id="ut-header-' , $location , '-extra-module" class="ut-horizontal-navigation">';
            
                    echo '<ul class="ut-header-extra-module-buttons ut-navigation-menu ut-navigation-more-disabled menu">';

                    foreach( $buttons as $button ) {

                        echo '<li>';

                            $this->create_button( $button['title'], $button['config'] );

                        echo '</li>';

                    }

                    echo '</ul>';
                
                echo '</div>';
				
			} else {
                
                echo '&nbsp;';
                
            }
			
		}
		
        
		/**
         * Create Header Extra Module Flush Class
         *
         * @access public
         */
        
        public function site_logo_flush_class() {
            
            if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) != 'no' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
                
                return 'ut-flush-logo';
                
            }
            
        }
        
        
        /**
         * Create Header Extra Module Flush Class
         *
         * @access public
         */
        
        public function extra_modul_flush_class() {
            
            if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
                
                return 'ut-flush-module';
                
            }            
            
        }
        
        /**
         * Create Header Extra Class
         *
         * @access public
         */
        
        public function extra_modul_class( $location = 'primary' ) {
            
            $classes = array(
                'none'           => '',
                'company_social' => 'ut-header-extra-module-company-social',
                'toolbar'        => 'ut-header-extra-module-toolbar',
                'custom_menu'    => 'ut-header-extra-module-dropdown-menu',
                'buttons'        => 'ut-header-extra-module-buttons',
                'custom_fields'  => 'ut-header-extra-module-custom-fields',
            );
            
            return $classes[ut_return_header_config( 'ut_header_' . $location . '_extra_module', 'company_social' )];
            
        }
        
        
		/**
         * Create Header Extra
         *
         * @access public
         */
        
		public function create_primary_header_extra() {
			
			$header_extra_module = ut_return_header_config( 'ut_header_primary_extra_module', 'company_social' );

			switch ( $header_extra_module ) {
				
				case "company_social":
					
					echo $this->create_header_social_icons('primary');
					
				break;	
					
				case "toolbar":
					
					$this->create_header_toolbar('primary');
					
				break;	
				
				case "custom_menu":
					
					$this->custom_navigation('primary');
					
				break;	
					
				case "buttons":
					
					$this->create_header_buttons('primary');
					
				break;
				
				case "custom_fields":
					
					$this->create_header_custom_fields('primary');
					
				break;
                    
                case "none":    
                    
                    echo '&nbsp;';
                    
                break;                        
					
				default: echo $this->create_header_social_icons('primary');
					
					
			}
			
		}		
		
		
		/**
         * Create Header Secondary Extra
         *
         * @access public
         */
		public function create_secondary_header_extra() {
			
			$header_extra_module = ut_return_header_config( 'ut_header_secondary_extra_module', 'company_social' );

			switch ( $header_extra_module ) {
				
				case "company_social":
					
					echo $this->create_header_social_icons('secondary');
					
				break;	
					
				case "toolbar":
					
					$this->create_header_toolbar('secondary');
					
				break;	
				
				case "custom_menu":
					
					$this->custom_navigation('secondary');
					
				break;	
					
				case "buttons":
					
					$this->create_header_buttons('secondary');
					
				break;
					
				case "custom_fields":
					
					$this->create_header_custom_fields('secondary');
					
				break;	
				
                case "none":    
                    
                    echo '&nbsp;';
                    
                break;    
                    
				default: echo $this->create_header_social_icons('secondary');
					
					
			}
			
		}
		
        /**
         * Create Header Tertiary Extra
         *
         * @access public
         */
		public function create_tertiary_header_extra() {
			
			$header_extra_module = ut_return_header_config( 'ut_header_tertiary_extra_module', 'company_social' );

			switch ( $header_extra_module ) {
				
				case "company_social":
					
					echo $this->create_header_social_icons('tertiary');
					
				break;	
					
				case "toolbar":
					
					$this->create_header_toolbar('tertiary');
					
				break;	
				
				case "custom_menu":
					
					$this->custom_navigation('tertiary');
					
				break;	
					
				case "buttons":
					
					$this->create_header_buttons('tertiary');
					
				break;
					
				case "custom_fields":
					
					$this->create_header_custom_fields('tertiary');
					
				break;
                    
                case "none":    
                    
                    echo '&nbsp;';
                    
                break;    
					
				default: echo $this->create_header_social_icons('tertiary');
					
					
			}
			
		}
        
        
		/**
         * Turn an array of classes into a string
         *
         * @access public
         */ 
        
        public function overlay_class( $copyright, $social ) {
            
			$classes = array();
			
			$classes[] = 'ut-overlay-menu-' . ot_get_option( "ut_global_overlay_content_width", "fullwidth" );
			$classes[] = 'ut-overlay-menu-align-' . ot_get_option( "ut_global_overlay_content_align", "centered" );
			$classes[] = 'ut-overlay-menu-reverse-' . ot_get_option( "ut_global_overlay_footer_reverse", "off");
			
			if( $social || $copyright ) {
    
				$classes[] = 'ut-overlay-menu-with-footer';

			}
			
            return implode( " ", $classes );
        
        }
		
		
		/** 
		 * Prints the Overlay Navigation (Hooked into Footer )
		 *
		 * @return    html
		 *
		 * @access    public
		 * @since     1.0.0
		 * @version   1.0.0
		 */
		public function overlay_navigation() {
			
			if( !$this->overlay_navigation ) {
				return;
			}
			
			// overlay footer copyright
			$copyright = ot_get_option( 'ut_overlay_copyright' );
			
			// overlay footer social icons
			$social = ot_get_option( 'ut_overlay_social_icons' ); // @todo global

			$data_logo_font_size = '';

			if( defined('UT_SHORTCODES_VERSION') ) {

				$font_size = ut_get_theme_options_font_setting( 'site_logo','font-size', "16" );
				$data_logo_font_size = 'data-font-size="' . esc_attr( $font_size ) . '"';

			} ?>

			<div id="ut-overlay-menu" class="ut-overlay-menu <?php echo $this->overlay_class( $copyright, $social ); ?>">

				<?php if( ot_get_option( 'ut_global_overlay_logo', 'off' ) == 'text' ) : ?>

					<div class="site-logo">
						<h1 class="logo"><a data-responsive-font="site_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php echo $data_logo_font_size; ?>><?php bloginfo( 'name' ); ?></a></h1>
					</div>

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_logo', 'off' ) == 'custom' && ot_get_option("ut_overlay_logo") ) : ?>    

					<div id="ut-overlay-site-logo" class="site-logo ut-overlay-site-logo">
						<a data-responsive-font="site_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo ot_get_option("ut_overlay_logo"); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					</div>        

				<?php endif; ?>   

				<div class="ut-overlay-menu-row">

					<div class="ut-overlay-menu-row-inner">

						 <?php echo $this->create_overlay_menu(); ?>            

					</div>

					<?php if( $social || $copyright ) : ?>

						<!-- overlay footer -->
						<div id="ut-overlay-menu-footer" class="ut-overlay-menu-row-inner">

							<?php 

							echo '<div class="ut-overlay-footer-icons-wrap ut-overlay-menu-cell">';

							if( is_array( $social ) && !empty( $social ) ) {

								echo '<ul class="ut-overlay-footer-icons">';    

									foreach( $social as $icon => $value) {

										$link  = !empty( $value["link"] )  ? esc_url( $value["link"] ) : '#' ;
										$title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

										echo '<li>';
											echo '<a '.$title.' href="'.$link.'" target="_blank"><i class="fa '.$value["icon"].' fa-lg"></i></a>';
										echo '</li>';

									}

								echo '</ul>';    

							}             

							echo '</div>'; ?>

							<div class="ut-overlay-copyright ut-overlay-menu-cell">

								<?php echo ot_get_option( 'ut_overlay_copyright' ); ?> 

							</div>                                                                         

						</div>    
						<!-- /end overlay footer --> 

					<?php endif; ?>                          

				</div>

			</div>
			
			<?php			
			
		}		
		
	}
	
}


/**
 * Top Header Menu Walker
 *
 * @since     4.9
 * @version   1.0.0
 *
 */

class UT_Top_Header_Menu extends Walker_Nav_Menu {
	
    
    /**
	 * Starts the list before the elements are added.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::start_lvl()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
        
		$indent = str_repeat( $t, $depth );
		
        // Default class.
		// $classes = array( 'sub-menu' );
        $classes = array();
        
		/**
		 * Filters the CSS class(es) applied to a menu list element.
		 *
		 * @since 4.8.0
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
		 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$output .= "{$n}{$indent}<ul$class_names>{$n}";
        
	}
        
	/**
	 * Starts the element output.
	 *
	 * @since 3.0.0
	 * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
	 *
	 * @see Walker::start_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Menu item data object.
	 * @param int      $depth  Depth of menu item. Used for padding.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 * @param int      $id     Current item ID.
	 */
    
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
        
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		/**
		 * Filters the arguments for a single nav menu item.
		 *
		 * @since 4.4.0
		 *
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param WP_Post  $item  Menu item data object.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

		/**
		 * Filters the CSS classes applied to a menu item's list item element.
		 *
		 * @since 3.0.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
        
        // extra class if has children
        if( in_array('menu-item-has-children', $classes ) ) {
            $classes[] = 'ut-top-header-has-submenu';
        }

        // extra class if has border separator
        if( ut_return_header_config( 'ut_top_header_border_separator', 'off' ) == 'on' && $depth == 0 ) {
            $classes[] = 'ut-top-header-border-separator';
        }
        
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filters the ID applied to a menu item's list item element.
		 *
		 * @since 3.0.1
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
		 * @param WP_Post  $item    The current menu item.
		 * @param stdClass $args    An object of wp_nav_menu() arguments.
		 * @param int      $depth   Depth of menu item. Used for padding.
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';
        
        // sub menu container
        if( $depth == 0 ) {
            
            $output .= '<div class="ut-top-header-sub-menu">';
            
        }
                
		$atts                 = array();
		$atts['title']        = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target']       = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']          = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']         = ! empty( $item->url ) ? $item->url : '';
		$atts['aria-current'] = $item->current ? 'page' : '';

		/**
		 * Filters the HTML attributes applied to a menu item's anchor element.
		 *
		 * @since 3.6.0
		 * @since 4.1.0 The `$depth` parameter was added.
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
		 *
		 *     @type string $title        Title attribute.
		 *     @type string $target       Target attribute.
		 *     @type string $rel          The rel attribute.
		 *     @type string $href         The href attribute.
		 *     @type string $aria_current The aria-current attribute.
		 * }
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        
        if( $depth == 0 ) {
            
            if( !isset( $atts['class'] ) ) {
                
                $atts['class'] = 'ut-top-header-main-link';
                
            } else {
                
                $atts['class'] =  $atts['class'] . ' ut-top-header-main-link';
                
            }            
            
        }
        
        if( $depth == 1 ) {
            
            if( !isset( $atts['class'] ) ) {
                
                $atts['class'] = 'ut-top-header-submenu-link';
                
            } else {
                
                $atts['class'] =  $atts['class'] . ' ut-top-header-submenu-link';
                
            }            
            
        }
        
        
        
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		/**
		 * Filters a menu item's title.
		 *
		 * @since 4.4.0
		 *
		 * @param string   $title The menu item's title.
		 * @param WP_Post  $item  The current menu item.
		 * @param stdClass $args  An object of wp_nav_menu() arguments.
		 * @param int      $depth Depth of menu item. Used for padding.
		 */
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filters a menu item's starting output.
		 *
		 * The menu item's starting output only includes `$args->before`, the opening `<a>`,
		 * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
		 * no filter for modifying the opening and closing `<li>` for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string   $item_output The menu item's starting HTML output.
		 * @param WP_Post  $item        Menu item data object.
		 * @param int      $depth       Depth of menu item. Used for padding.
		 * @param stdClass $args        An object of wp_nav_menu() arguments.
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @since 3.0.0
	 *
	 * @see Walker::end_el()
	 *
	 * @param string   $output Used to append additional content (passed by reference).
	 * @param WP_Post  $item   Page data object. Not used.
	 * @param int      $depth  Depth of page. Not Used.
	 * @param stdClass $args   An object of wp_nav_menu() arguments.
	 */
    
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
        
        if( $depth == 0 ) {
            $output .= '</div>';            
        }
        
		$output .= "</li>{$n}";
	}

} 