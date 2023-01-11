<?php

if( !function_exists('ut_metabox_portrait_image') ) :

    function ut_metabox_portrait_image() {

        $ut_metabox_portrait_image = array(

            'id'          => 'ut_metabox_portrait_image',
            'title'       => 'Featured Portrait Image',
            'desc'        => '',
            'pages'       => array( 'portfolio' ),
            'type'        => 'simple',
            'context'     => 'side',
            'priority'    => 'low',
            'fields'      => array(

                array(
                    'id' => 'ut_portrait_featured_image',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Upload',
                    'desc' => 'Only for showcases with Portrait Support. Should be at <b>least 750x1125</b> or higher with same aspect ratio.',
                    'type' => 'upload_id'
                )

            )

        );

        ot_register_meta_box( $ut_metabox_portrait_image );

    }

    add_action( 'admin_init', 'ut_metabox_portrait_image' );

endif;