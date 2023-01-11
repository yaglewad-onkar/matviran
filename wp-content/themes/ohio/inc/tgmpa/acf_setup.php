<?php

/* function remove_acf_menu() {
	remove_menu_page('edit.php?post_type=acf-field-group');
}
add_action( 'admin_menu', 'remove_acf_menu', 999 ); */

function ohio_acf_json_load_point( $paths ) {
	$paths = array( get_template_directory() . '/inc/tgmpa/acf-json' );
	if( is_child_theme() ) {
		$paths[] = get_stylesheet_directory() . '/inc/tgmpa/acf-json';
	}
	return $paths;
}

// add_filter('acf/settings/load_json', 'ohio_acf_json_load_point');
add_action('init', 'load_exported_fields');
function load_exported_fields(){
	require 'acf-php/bootstrap.php';
}

if ( function_exists( 'acf_add_options_page' ) && function_exists( 'acf_add_options_sub_page' ) ) {

	// acf_add_options_page(array(
	// 	'page_title' => esc_html__( 'Ohio Theme Settings', 'ohio' ),
	// 	'menu_title' => esc_html__( 'Theme Settings', 'ohio' ),
	// 	'menu_slug' => 'theme-general',
	// 	'capability' => 'edit_posts',
	// 	'icon_url' => get_template_directory_uri().'/inc/tgmpa/theme_settings.png'
	// ));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Pages Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Site Identity', 'ohio' ),
		'menu_slug' => 'theme-general',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Pages Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Theme Styling', 'ohio' ),
		'menu_slug' => 'theme-general-styling',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Pages Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Typography', 'ohio' ),
		'menu_slug' => 'theme-general-typography',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Header Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Header', 'ohio' ),
		'menu_slug' => 'theme-general-header',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Header Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Menu', 'ohio' ),
		'menu_slug' => 'theme-general-menu',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Pages Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Page Settings', 'ohio' ),
		'menu_slug' => 'theme-general-pages',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Portfolio Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Portfolio', 'ohio' ),
		'menu_slug' => 'theme-general-portfolio',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Blog Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Blog', 'ohio' ),
		'menu_slug' => 'theme-general-blog',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Post Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Single Post', 'ohio' ),
		'menu_slug' => 'theme-general-post',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme WooCommerce Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Shop', 'ohio' ),
		'menu_slug' => 'theme-general-woocommerce',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme WooCommerce Product Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Single Product', 'ohio' ),
		'menu_slug' => 'theme-general-product',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Footer Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Footer', 'ohio' ),
		'menu_slug' => 'theme-general-footer',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Blog Settings', 'ohio' ),
		'menu_title' => esc_html__( 'Custom CSS', 'ohio' ),
		'menu_slug' => 'theme-general-custom',
		'parent_slug' => '_ohio_fake'
	));

	acf_add_options_sub_page(array(
		'page_title' => esc_html__( 'Theme Plugins', 'ohio' ),
		'menu_title' => esc_html__( 'Other', 'ohio' ),
		'menu_slug' => 'theme-general-other',
		'parent_slug' => '_ohio_fake'
	));

}

// Hide "inherit" option for global background types
add_filter('acf/load_field/name=background_type', function( $field ) {
	if ( function_exists( 'get_current_screen' ) ) {
		$screen = get_current_screen();
		if ( isset( $screen->base ) ) {
			if ( in_array( $screen->base, [
				'theme-settings_page_theme-general-pages',
				'theme-settings_page_theme-general-header',
				'theme-settings_page_theme-general-footer'
			] ) ) {
				unset($field['choices']['inherit']);
			}
		}
	}

	// Fallback for new code
	if ( !empty( $_GET['options_page'] ) ) {
		if ( in_array( $_GET['options_page'], [
			'theme-general-pages',
			'theme-general-header',
			'theme-general-footer'
		] ) ) {
			unset($field['choices']['inherit']);
		}
	}

	return $field;
});

// Remove post options from Page settings if not post page
add_filter('acf/get_fields', function( $fields, $parent ) {
    if ( ! function_exists( 'get_current_screen' ) ) {
        return $fields;
    }

    $screen = get_current_screen();
    if ( isset( $screen->base ) ) {
        if ( $screen->post_type == 'post' ) {
            return $fields;
        }

        foreach ( $fields as $key => $field ) {
            if ( $field['name'] == 'page_post_style_in_grid' ) unset( $fields[$key] );

            if ( $screen->base != 'theme-settings_page_theme-general-post' ) {
                if ( $field['name'] == 'header_title_subtitle_type' ) unset( $fields[$key] );
            }
        }
    }

    return $fields;
}, 20, 2);

// Header title additional "Featured image" option
add_filter('acf/prepare_field/name=page_header_title', function( $field ) {
	$field['sub_fields'][0]['choices']['featured'] = 'Featured image';
	return $field;
});
// Global post header title additional "Featured image" option
add_filter('acf/prepare_field/name=global_post_page_header_title', function( $field ) {
	$field['sub_fields'][0]['choices']['featured'] = 'Featured image';
	return $field;
});

// Inherited slug field apply
add_filter('acf/prepare_field/type=clone', function( $field ) {
	$background_group_key = 'group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3';
	if ( $field['clone'] && $field['clone'][0] == $background_group_key ) {

		if ( isset( $field['inherited_slug'] ) && isset( $field['sub_fields'][0]['choices']['inherit'] ) ) {
			$field['sub_fields'][0]['choices']['inherit'] = $field['inherited_slug'];
		}
	}

	return $field;
});


/*
// Hard return values for ACF
function ohio_acf_return_default_when_null( $value = NULL, $post_id = NULL, $field = NULL ) {
	if ( ( $field['type'] == 'radio' || $field['type'] == 'select' || $field['type'] == 'true_false' ) && $field['default_value'] && $value == '' ) {
		if ( is_array( $field['default_value'] ) && count( $field['default_value'] ) == 1 ) {
			$field['default_value'] = $field['default_value'][0];
		}
		$value = $field['default_value'];
	}
	return $value;
}

add_filter( 'acf/load_value', 'ohio_acf_return_default_when_null', 10, 3 );
*/

// fallbacks
 if ( ! is_admin() ) {

 	if ( ! function_exists( 'have_rows' ) ) {
 		function have_rows() {
 			return false;
 		}
 	}

 	if ( ! function_exists( 'the_row' ) ) {
 		function the_row() {
 			return false;
 		}
 	}
 }



/*
 * Sync ACF main lang options
 */
// add_action('acf/save_post', 'ohio_sync_custom_field', 11);

function ohio_sync_custom_field ( $current_post_id ) {
	$post_ids = [];

	if (function_exists('icl_get_languages')) {
		$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');
		$wpml_options = get_option( 'icl_sitepress_settings' );
		$default_lang = $wpml_options['default_language'];

		$option_pages = array();
		foreach ($langs as $language) {
			if ($language['language_code'] === $default_lang) {
				$post_ids[$default_lang] = 'option';
				$option_pages[] =  'options';
			} else {
				$post_ids[$language['language_code']] = 'options_'.$language['language_code'];
				$option_pages[] =  'options_'.$language['language_code'];
			}
		}

		$options = get_field_objects('option');

		// Sync option page fields
		if (in_array($current_post_id,$option_pages)) {
			foreach ($options as $field) {
				$value = get_field( $field['name'], 'option', $field['type'] == 'file' ? false : null);

				foreach ($post_ids as $lang_id) {
					if ( 'option' != $lang_id ) {
						update_field( $field['name'], $value, $lang_id);
					}
				}
			}
		}
	}
}


if( function_exists('acf_add_local_field_group') && function_exists('wc_get_attribute_taxonomy_names') ):

	$attribute_terms = wc_get_attribute_taxonomy_names();

	if ($attribute_terms) {
		$group_filter = array();
		foreach( $attribute_terms as $attribute_term ) {
			$group_filter[] = array( array(
				'param'    => 'taxonomy',
				'operator' => '==',
				'value'    => $attribute_term,
				'order_no' => 0,
				'group_no' => 0,
			) );
		}

		acf_add_local_field_group(array (
			'key' => 'ohioattrsetting',
			'title' => esc_html__('Attribute setting', 'ohio'),
			'fields' => array (
				array (
					'key' => 'field_ohioattrsettingselect',
					'label' => 'Mod',
					'name' => 'attribute_mod',
					'type' => 'select',
					'choices' => array(
						'default' 	=> 'Default',
						'color'		=> 'Color'
					),
					'allow_null' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array(
					'key'	=> 'field_ohioattrsettingcolor',
					'label' => 'Choose color',
					'name' => 'color',
					'type' => 'color_picker',
					'conditional_logic'	=> array(
						array(
							array(
								'field' => 'field_ohioattrsettingselect',
								'operator' => '==',
								'value' => 'color')
							)
						)
				)
			),
			'location' => $group_filter,
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));
	}
endif;

// Refresh permalinks after options update
function ohio_acf_update_project_slug_value( $value, $post_id, $field ) {
	$value = OhioHelper::slug_from_string( $value );
	if ( empty( $value ) ) {
		$value = 'project';
	}

	delete_option( 'rewrite_rules' );

	return $value;
}

add_filter('acf/update_value/key=field_59fb4ad44a1dtd336sl', 'ohio_acf_update_project_slug_value', 10, 3);

// Update with short param ids
add_filter( 'option__options_global_header_menu_social_links', function( $value ) {
	return 'field_snlid';
});