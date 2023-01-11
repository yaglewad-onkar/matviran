<?php

add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_action('woocommerce_product_query', 'ohio_products_per_page', 1, 50);
function ohio_products_per_page($query)
{
    if ($query->is_main_query()) {
        $query->set('posts_per_page', '12');
    }
}


// Widgets
function ohio_woocommerce_tag_cloud_widget()
{
    $args = array(
        'smallest' => 11,
        'largest' => 11,
        'unit' => 'px',
        'number' => 15,
        'taxonomy' => 'product_tag'
    );
    return $args;
}

add_filter('woocommerce_product_tag_cloud_widget_args', 'ohio_woocommerce_tag_cloud_widget');


function ohio_woocommerce_scripts()
{

    $products_in_row = OhioOptions::get_global('woocommerce_products_in_row');
    if (is_string($products_in_row)) {
        $products_in_row = json_decode($products_in_row);
    }
    if ($products_in_row == NULL) {
        $products_in_row = (object)array(
            "large" => "3",
            "medium" => "2",
            "small" => "2"
        );
    }
    $translation_array = array(
        'updating_text' => esc_html__('Updating...', 'ohio'),
        'warn_remove_text' => esc_html__('Are you sure you want to remove this item from cart?', 'ohio')
    );
}

add_action('wp_enqueue_scripts', 'ohio_woocommerce_scripts');


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


function ohio_woocommerce_message_filter_function($message)
{
    $message = preg_replace('/(<a)(.+\/a>)(.+)/i', '${3} ${1} ${2}', $message);
    $message = preg_replace('/"button/i', '"', $message);
    return $message;
}

add_filter('woocommerce_add_message', 'ohio_woocommerce_message_filter_function', 10, 1);
add_filter('woocommerce_add_error', 'ohio_woocommerce_message_filter_function', 10, 1);
add_filter('woocommerce_add_notice', 'ohio_woocommerce_message_filter_function', 10, 1);

// WooCommerce sidebar
function ohio_woocommerce_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Shop', 'ohio'),
        'id' => 'wc_shop',
        'description' => esc_html__('WooCommerce sidebar.', 'ohio'),
        'before_title' => '<h3 class="title widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'ohio_woocommerce_widgets_init');

function ohio_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    $fragments['span.cart-counter'] = '<span class="cart-counter brand-bg-color">' . esc_attr($woocommerce->cart->cart_contents_count) . '</span>';
    return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1);
function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start(); ?>
    <a class="cart-customlocation"
       href="<?php echo wc_get_cart_url(); ?>"><?php echo WC()->cart->get_total(); ?></a>
    <?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'ohio_woocommerce_header_add_to_cart_fragment');

// WooCommerce size images
function ohio_woocommerce_image_dimensions()
{
    $catalog = array(
        'width' => '800',
        'height' => '',
        'crop' => 1
    );
    $single = array(
        'width' => '600',
        'height' => '',
        'crop' => 1
    );
    $thumbnail = array(
        'width' => '120',
        'height' => '',
        'crop' => 1
    );

    update_option('shop_catalog_image_size', $catalog);
    update_option('shop_single_image_size', $single);
    update_option('shop_thumbnail_image_size', $thumbnail);
}

add_action('init', 'ohio_woocommerce_image_dimensions', 1);


// add_filter( 'login_errors', create_function('$a', "return null;") );


// Wishlist

if (!function_exists('yith_wcwl_is_wishlist_page') && function_exists('yith_wcwl_object_id')) {
    /**
     * Check if current page is wishlist
     *
     * @return bool
     * @since 2.0.13
     */
    function yith_wcwl_is_wishlist_page()
    {
        $wishlist_page_id = yith_wcwl_object_id(get_option('yith_wcwl_wishlist_page_id'));

        if (!$wishlist_page_id) {
            return false;
        }

        return is_page($wishlist_page_id);
    }
}

//	WooProduct fallback
if (!function_exists('is_product')) {
    function is_product()
    {
        return false;
    }
}

// Ajax cart
add_action('wp_ajax_ohio_ajax_add_to_cart_woo', 'ohio_ajax_add_to_cart_woo_callback');
add_action('wp_ajax_nopriv_ohio_ajax_add_to_cart_woo', 'ohio_ajax_add_to_cart_woo_callback');
function ohio_ajax_add_to_cart_woo_callback()
{
    ob_start();
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : apply_filters('woocommerce_stock_amount', $_POST['quantity']);

    $variation_id = null;
    if ( isset( $_POST['variation_id'] ) ) {
        $variation_id = apply_filters('woocommerce_add_to_cart_variation_id', absint($_POST['variation_id']));
    }
    $variation = [];
    foreach ( $_POST as $key => $value ) {
        if ( strpos( $key, 'attribute_' ) === 0 ) {
            $variation[$key] = $value;
        }
    }

    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        if (get_option('woocommerce_cart_redirect_after_add') == 'yes') {
            wc_add_to_cart_message(array($product_id => $quantity), false);
        }
        WC_AJAX::get_refreshed_fragments();
    } else {
        // $this->json_headers();
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        wp_send_json($data);
    }
    die();
}

add_action('wp_ajax_ohio_ajax_add_to_cart_woo_single', 'ohio_ajax_add_to_cart_woo_single_callback');
add_action('wp_ajax_nopriv_ohio_ajax_add_to_cart_woo_single', 'ohio_ajax_add_to_cart_woo_single_callback');
function ohio_ajax_add_to_cart_woo_single_callback()
{
    ob_start();
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : apply_filters('woocommerce_stock_amount', $_POST['quantity']);

    $variation_id = null;
    if ( isset( $_POST['variation_id'] ) ) {
        $variation_id = apply_filters('woocommerce_add_to_cart_variation_id', absint($_POST['variation_id']));
    }
    $variation = [];
    foreach ( $_POST as $key => $value ) {
        if ( strpos( $key, 'attribute_' ) === 0 ) {
            $variation[$key] = $value;
        }
    }

    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id, $variation)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        if (get_option('woocommerce_cart_redirect_after_add') == 'yes') {
            wc_add_to_cart_message($product_id);
        }
        WC_AJAX::get_refreshed_fragments();
    } else {
        // $this->json_headers();
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        wp_send_json($data);
    }
    die();
}


add_filter('body_class', 'ohio_single_product_classes');
function ohio_single_product_classes($classes)
{

    if (is_product()) {
        $classes[] = 'type1' . '-' . OhioOptions::get('woocommerce_view_mode', 'left');
    }

    return $classes;
}


// Ajax search
add_action('wp_ajax_ohio_ajax_search', 'ohio_ajax_search');
add_action('wp_ajax_nopriv_ohio_ajax_search', 'ohio_ajax_search');
function ohio_ajax_search()
{

    global $woocommerce;
    $products = array();
    $allowed_html = array(
        'div' => array(
            'class' => true,
            'id' => true
        ),
        'img' => array(
            'class' => true,
            'src' => true,
            'alt' => true
        ),
        'span' => array(
            'class' => true
        )
    );

    if (!empty($_POST['search_query'])) {

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => '3',
            'fields' => 'ids',
            's' => $_POST['search_query'],
        );

        if (!empty($_POST['search_term'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $_POST['search_term'],
                )
            );
        }

        $ids_query = new WP_Query($args);
        $ids_query = $ids_query->posts;

        if (!empty($ids_query)) {
            $query = new WC_Product_Query(array(
                'limit' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
                'include' => $ids_query
            ));
            $products = $query->get_products();
        }

    } else {

        $args = array(
            'post_type' => 'product',
            'posts_per_page' => '3',
            'fields' => 'ids',
        );

        if (!empty($_POST['search_term'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $_POST['search_term'],
                )
            );
        }

        $ids_query = new WP_Query($args);
        $ids_query = $ids_query->posts;

        $query = new WC_Product_Query(array(
            'limit' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
            'include' => $ids_query
        ));
        $products = $query->get_products();

    }

    $response = ohio_search_draw($products, '', $_POST['search_query'], $_POST['search_term']);

    echo wp_kses($response, $allowed_html);

    wp_die();
}

function ohio_search_draw($products = null, $response = '', $s = '', $search_term = '')
{

    if (!empty($products)) {

        $response .= "<div class='suggestions'>" . esc_html__("Search suggestions", "ohio") . "</div>";

        foreach ($products as $product) {

            $id = $product->get_id();
            $name = $product->get_name();
            $price = $product->get_price();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'thumbnail')[0];
            $url = get_the_permalink($id);
            $currency = get_woocommerce_currency_symbol();
            $categories = get_woocommerce_currency_symbol();
            $cats = get_the_terms($id, 'product_cat');


            $response .= "
            <div id='product-$id' class='product_search'>
                <div class='product_search_img'>
                <a href='$url'>
                    <img src='$image' />
                </a>
                </div>
                <div class='product_search_description '>
                    <a href='$url' class='product_search_name'>
                        <div>$name</div>
                    </a>
                    ";

            if ($cats) {
                $cat_count = sizeof($cats);
                $response .= wc_get_product_category_list($id, ', ', '<span class="woo-c_product_category">' . _n('', '', $cat_count, 'ohio') . ' ', '<span class="dot-divider"></span></span>');
            }


            $response .= "
                    
                </div>
            ";

            if (!empty($price)) {
                $response .= "<div  class='product_search_price'><a href='$url'><span class=''>$currency</span>$price</div></a>";
            }
            $response .= "
                </div>";
        }


        // count of found posts
        $count = 0;
        if ($search_term) {
            $term = get_term($search_term, 'product_cat');
            $url = get_term_link($term);
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'fields' => 'ids',
                's' => $s,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $_POST['search_term'],
                    )
                )
            );
            $query = new WP_Query($args);
            $count = $query->post_count;
        } else {
            $url = get_permalink(wc_get_page_id('shop'));
            if ($s) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                    's' => $s,
                );
                $query = new WP_Query($args);
                $count = $query->post_count;
            } else {
                $products_total = wp_count_posts('product');
                $count = $products_total->publish;
            }
        }

        $response .= '<div id="search_form_action" data-href="' . $url . '"></div>';

        // if count > 3 we showing btn
        if ($count > 3) {
            $response .= "<a href='#' class='btn btn-link search_results_btn btn-loading-disable'>";
            $response .= esc_html__('Show All', 'ohio');
            $response .= "<i class='ion-right ion'><svg class='arrow-icon' width='18' height='14' viewBox='0 0 18 14' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M0 7H16M16 7L11 1M16 7L11 13' stroke-width='2'/></svg></i>";
            $response .= "</a>";
        }
    } else {
        $response = '<div class="no-search-results">';
        $response .= esc_html__('No results for your search query', 'ohio');
        $response .= '</div>';
    }
    return wp_send_json($response);
}

/**
 * Change number of related products output
 */
function ohio_woo_related_products_limit( $args ) {
    global $product;

    $related_products_number = (int)OhioOptions::get_global( 'woocommerce_product_related_amount', 3 );
    if ( $related_products_number < 1 || $related_products_number > 12 ) {
        $related_products_number = 3;
    }

    $args['posts_per_page'] = (int)$related_products_number;

    return $args;
}
add_filter( 'woocommerce_related_products_args', 'ohio_woo_related_products_limit', 20, 1 );
