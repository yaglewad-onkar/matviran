<?php

/**
 * Theme Ajax Class
 *
 * @since     4.9
 * @version   1.0.0
 *
 */
    
class UT_Ajax_Class {
    
    
    /**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the theme.
	 *
	 * @since    1.1.0
	 * @access   protected
	 * @var      UT_Loader  $loader  Maintains and registers all hooks for the framework.
	 */
	protected $loader;
    
    
    /**
     * Instantiates the class
     */

    function __construct() {
        
        // initialize loader
		$this->loader = new Unite_Theme_Loader();
        
        // register action
		$this->register_actions();         

    }
    
    /**
	 * Register all of actions
	 *
	 * @since    4.9.0
	 * @version  1.0.0
	 */

	public function register_actions() {
        
        // Woocommerce Remove Cart Item
        $this->loader->add_action( 'wp_ajax_remove_item_from_cart' , $this, 'remove_item_from_cart' );
        $this->loader->add_action( 'wp_ajax_nopriv_remove_item_from_cart' , $this, 'remove_item_from_cart' );
        
        // Woocommerce Add Cart Item
        $this->loader->add_filter( 'woocommerce_add_to_cart_fragments' , $this, 'shopping_cart_update' );
        
    }
    
    
    /** 
     * Shopping Cart Count Update
     *
     * @return    array
     *
     * @access    public
     * @since     4.9.0
     * @version   1.0.0
     */

    public function shopping_cart_update( $fragments ) {
        
        ob_start();
        
        if ( ! WC()->cart->is_empty() ) { 
        
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

            $fragments['ol.ut-header-mini-cart-overflow-container'] = '<ol class="ut-header-mini-cart-overflow-container">' . ob_get_clean() . '</ol>';        
            $fragments['span.ut-header-cart-count'] = '<span class="ut-header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
            $fragments['span.ut-header-mini-cart-total-count'] = '<span class="ut-header-mini-cart-total-count">' . WC()->cart->get_cart_contents_count() . ' ' . esc_html__( 'item(s)', 'unitedthemes' ) . '</span>';
            $fragments['span.ut-header-mini-cart-total-price'] = '<span class="ut-header-mini-cart-total-price">' . WC()->cart->get_cart_total() . '</span>';
        
        } 
            
        return $fragments;			

    }
    
    
    /**
	 * Remove Cart Items
	 *
	 * @since    4.9.0
	 * @version  1.0.0
	 */
    
    public function remove_item_from_cart() {
        
        $cart_item_key = esc_attr( $_POST['cart_item_key'] );
        
        header('Content-Type: application/json');
        
        if( $cart_item_key ) {
            
            WC()->cart->remove_cart_item( $cart_item_key );
            
            if ( ! WC()->cart->is_empty() ) { 
            
                $cart_status = array(
                    'cart_needs_update'    => true,
                    'cart_is_empty'        => false,
                    'cart_contents_count'  => WC()->cart->get_cart_contents_count(),
                    'cart_total'           => WC()->cart->get_cart_total()              
                );
            
            } else {
                
                ob_start();
                
                echo '<li class="ut-header-mini-cart-item ut-header-mini-cart-item-empty clearfix">';    
                            
                    echo '<a class="ut-header-mini-cart-link" href="' , esc_url( get_permalink( wc_get_page_id('shop') ) ) , '">';

                        esc_html_e( 'Your cart is currently empty.', 'unitedthemes' );

                    echo '</a>';

                echo '</li>';
                
                $cart_status = array(
                    'cart_needs_update'    => true,
                    'cart_is_empty'        => true,
                    'cart_empty'           => ob_get_clean(),
                    'cart_contents_count'  => WC()->cart->get_cart_contents_count(),
                    'cart_total'           => WC()->cart->get_cart_total()
                );                
                
            }
            
            echo json_encode( $cart_status );
            die();
            
        } 
        
        $cart_status = array(
            'cart_needs_update' => false            
        );
        
        echo json_encode( $cart_status );
        die();
        
        
    }
    
    
    /**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
    
	public function run() {

		$this->loader->run();

	}

}

function run_theme_ajax() {

	$unite = new UT_Ajax_Class();
	$unite->run();

}

run_theme_ajax();