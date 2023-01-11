<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class UT_Secondary_Title {


    public function __construct() {

        if ( is_admin() ) {

            /* meta box html */
            add_action( 'admin_menu', array( $this, 'meta_box_setup' ), 20 );
            add_action( 'save_post', array( $this, 'save_secondary_title_meta' ), 20 );

        }

    }

    public function meta_box_setup() {

        add_meta_box(
            'ut-secondary-title' ,
            esc_html__( 'Secondary Title' , 'unitedthemes' ),
            array( &$this, 'meta_box_content' ),
            'post',
            'normal',
            'default'
        );

    }

    public function meta_box_content() {

        global $post;

        $secondary_title = get_post_meta( $post->ID, 'post_title_secondary', true ); ?>

        <div id="ut-secondary-title-wrap">

            <input type="hidden" name="post_title_secondary_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

            <p><?php esc_html_e( 'Sub Title', 'unitedthemes' ); ?></p>
            <input type="text" name="post_title_secondary" size="30" value="<?php echo $secondary_title; ?>" id="title_secondary" spellcheck="true" autocomplete="off">

        </div>

        <?php

    }

    function save_secondary_title_meta( $post_id ) {

        // verify nonce
        if ( !isset( $_POST['post_title_secondary_nonce'] ) || !wp_verify_nonce( $_POST['post_title_secondary_nonce'], basename(__FILE__) ) ) {
            return $post_id;
        }

        // check autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // check permissions
        if ( 'portfolio' === $_POST['post_type'] ) {

            if ( !current_user_can( 'edit_page', $post_id ) ) {

                return $post_id;

            } elseif ( !current_user_can( 'edit_post', $post_id ) ) {

                return $post_id;

            }

        }

        $old = get_post_meta( $post_id, 'post_title_secondary', true );
        $new = $_POST['post_title_secondary'];

        if ( $new && $new !== $old ) {

            update_post_meta( $post_id, 'post_title_secondary', $new );

        } elseif ( '' === $new && $old ) {

            delete_post_meta( $post_id, 'post_title_secondary', $old );

        }

    }


}

new UT_Secondary_Title();