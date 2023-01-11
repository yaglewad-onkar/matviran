<?php

if( !function_exists('ut_metabox_product_settings') ) :

	function ut_metabox_product_settings() {

		$ut_metabox_product_settings = array(

			'id'          => 'ut_metabox_product_settings',
			'title'       => 'Hover Product Image',
			'desc'        => '',
			'pages'       => array( 'product' ),
			'type'        => 'simple',
			'context'     => 'side',
			'priority'    => 'low',
			'fields'      => array(

				array(
					'id' => 'ut_second_featured_image',
					'metapanel' => 'ut-hero-type',
					'label' => 'Hover Image',
					'desc' => 'Some Brooklyn Shop Layouts do support an image hover effect. This product image display on hover.',
					'type' => 'upload_id'
				)

			)

		);

		ot_register_meta_box( $ut_metabox_product_settings );

	}

	add_action( 'admin_init', 'ut_metabox_product_settings' );

endif;

