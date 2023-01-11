<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Single_Post_CSS' ) ) {

    class UT_Single_Post_CSS extends UT_Custom_CSS {

        public function custom_css() {

            if( !is_singular('post') ) {

                return;

            }

            ob_start(); ?>

            <style id="ut-single-post-custom-css" type="text/css">

                #ut-sitebody.single-post .tags-links,
                #ut-sitebody.single-post .entry-header .single-post-entry-title,
                #ut-sitebody.single-post .entry-header .single-post-entry-sub-title {
                    text-align: <?php echo ut_collect_option('ut_post_title_align', 'left', 'ut_'); ?> ;
                }

            </style>

            <?php

            /* output css */
            echo $this->minify_css( ob_get_clean() );


        }

    }

}