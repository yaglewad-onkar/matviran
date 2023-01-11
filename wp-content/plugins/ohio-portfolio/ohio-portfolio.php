<?php
/*
	Plugin Name: Ohio Portfolio
	Plugin URI: https://clbthemes.com
	Description: Supercharge your WordPress site with extended portfolio features.
	Version: 1.1.1
	Author: Colabrio
	Author URI: https://clbthemes.com

	Copyright 2020 Colabrio (email: team@clbthemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/



add_action( 'plugins_loaded', 'ohio_portfolio_load_plugin_textdomain' );

function ohio_portfolio_load_plugin_textdomain() {
    load_plugin_textdomain( 'ohio_portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'init', 'ohio_portfolio_register_my_cpts_portfolio' );

function ohio_portfolio_register_my_cpts_portfolio() {
    $labels = array(
        "name" => __( 'Portfolio', 'ohio_portfolio' ),
        "singular_name" => __( 'Project', 'ohio_portfolio' ),
        "menu_name" => __( 'Portfolio', 'ohio_portfolio' ),
        "all_items" => __( 'All Projects', 'ohio_portfolio' ),
        "add_new" => __( 'Add New', 'ohio_portfolio' ),
        "add_new_item" => __( 'Add New Portfolio Project', 'ohio_portfolio' ),
        "edit_item" => __( 'Edit Project', 'ohio_portfolio' ),
        "new_item" => __( 'New Portfolio Project', 'ohio_portfolio' ),
        "view_item" => __( 'View Project', 'ohio_portfolio' ),
        "search_items" => __( 'Search Projects', 'ohio_portfolio' ),
        "not_found" => __( 'No projects found', 'ohio_portfolio' ),
        "not_found_in_trash" => __( 'No projects found in Trash', 'ohio_portfolio' ),
        "parent_item_colon" => __( 'Parent Portfolio:', 'ohio_portfolio' ),
        "featured_image" => __( 'Featured image for this project', 'ohio_portfolio' ),
        "set_featured_image" => __( 'Set featured image for this project', 'ohio_portfolio' ),
        "remove_featured_image" => __( 'Remove featured image for this project', 'ohio_portfolio' ),
        "use_featured_image" => __( 'Use featured image for this project', 'ohio_portfolio' ),
        "archives" => __( 'Portfolio projects archive', 'ohio_portfolio' ),
        "insert_into_item" => __( 'Insert into project', 'ohio_portfolio' ),
        "uploaded_to_this_item" => __( 'Upload to this project', 'ohio_portfolio' ),
        "filter_items_list" => __( 'Filter projects', 'ohio_portfolio' ),
        "items_list_navigation" => __( 'Portfolio projects list navigation', 'ohio_portfolio' ),
        "items_list" => __( 'Portfolio projects list', 'ohio_portfolio' ),
        "parent_item_colon" => __( 'Parent Portfolio:', 'ohio_portfolio' ),
    );

    if ( class_exists( 'OhioOptions' ) ) {
        $slug = OhioOptions::get_global( 'portfolio_slug' );
    }

    if ( empty( $slug ) ) {
        $slug = 'project';
    }

    $args = array(
        "label" => __( 'Portfolio', 'ohio_portfolio' ),
        "labels" => $labels,
        "description" => __( "Portfolio post type for ohio theme.", "ohio" ),
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => $slug, "with_front" => true ),
        "query_var" => true,
        "menu_position" => 5,
        "menu_icon" => "dashicons-portfolio",
        "supports" => array( "title", "comments", "editor", "thumbnail", "revisions" ),
    );
    register_post_type( "ohio_portfolio", $args );
}

function ohio_portfolio_category_init() {
    $labels = array(
        'name' => _x( 'Categories', 'taxonomy general name', 'ohio_portfolio' ),
        'singular_name' => _x( 'Category', 'taxonomy singular name', 'ohio_portfolio' ),
        'search_items' => __( 'Search Categories', 'ohio_portfolio' ),
        'popular_items' => __( 'Popular Categories', 'ohio_portfolio' ),
        'all_items' => __( 'Categories', 'ohio_portfolio' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Category', 'ohio_portfolio' ),
        'update_item' => __( 'Update Category', 'ohio_portfolio' ),
        'add_new_item' => __( 'Add New Category', 'ohio_portfolio' ),
        'new_item_name' => __( 'New Portfolio Category', 'ohio_portfolio' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'ohio_portfolio' ),
        'add_or_remove_items' => __( 'Add or remove categories', 'ohio_portfolio' ),
        'choose_from_most_used' => __( 'Choose from the most used categories', 'ohio_portfolio' ),
        'not_found' => __( 'No categories found.', 'ohio_portfolio' ),
        'menu_name' => __( 'Categories', 'ohio_portfolio' ),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-category' ),
    );

    register_taxonomy( 'ohio_portfolio_category', array( 'ohio_portfolio' ), $args );

    $labels = array(
        'name' => _x( 'Tags', 'taxonomy general name', 'ohio_portfolio' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name', 'ohio_portfolio' ),
        'search_items' => __( 'Search Tags', 'ohio_portfolio' ),
        'popular_items' => __( 'Popular Tags', 'ohio_portfolio' ),
        'all_items' => __( 'Tags', 'ohio_portfolio' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag', 'ohio_portfolio' ),
        'update_item' => __( 'Update Tag', 'ohio_portfolio' ),
        'add_new_item' => __( 'Add New Tag', 'ohio_portfolio' ),
        'new_item_name' => __( 'New Portfolio Tag', 'ohio_portfolio' ),
        'separate_items_with_commas' => __( 'Separate tags with commas', 'ohio_portfolio' ),
        'add_or_remove_items' => __( 'Add or remove tags', 'ohio_portfolio' ),
        'choose_from_most_used' => __( 'Choose from the most used tags', 'ohio_portfolio' ),
        'not_found' => __( 'No tags found.', 'ohio_portfolio' ),
        'menu_name' => __( 'Tags', 'ohio_portfolio' ),
    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-tag' ),
    );

    register_taxonomy( 'ohio_portfolio_tags', array( 'ohio_portfolio' ), $args );
}

add_action( 'init', 'ohio_portfolio_category_init' );

function ohio_portfolio_flush() {
    flush_rewrite_rules(); // Fix 404 page on projects. Flush rules
}

register_activation_hook( __FILE__, 'ohio_portfolio_flush' );

?>