<?php

class Ohio_ACF_Admin_Options_Page {

    public $page;

    public function __construct()
    {
        if ( empty( $_GET['page'] ) || $_GET['page'] != 'ohio_hub_settings' ) {
            return;
        }

        add_action( 'admin_menu', [ $this,'admin_menu' ], 99, 0 );
    }

    public function admin_menu()
    {
        $options_slug = !empty( $_GET['options_page'] ) ? $_GET['options_page'] : 'theme-general';

        if ( empty( $options_slug ) ) return;

        $this->page = acf_get_options_page( $options_slug );
        if ( !$this->page ) return;

        // get post_id (allow lang modification)
        $this->page['post_id'] = acf_get_valid_post_id( $this->page['post_id'] );

        if ( acf_verify_nonce('options') ) {
            // save data
            if ( acf_validate_save_post( true ) ) {
                acf_update_setting( 'autoload', $this->page['autoload'] );

                acf_save_post( $this->page['post_id'] );

                wp_redirect( add_query_arg( [ 'message' => '1' ] ) );
                exit;
            }
        }

        acf_enqueue_scripts();

        add_action( 'acf/input/admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
        add_action( 'acf/input/admin_head', [ $this,'admin_head' ] );

        add_screen_option( 'layout_columns', [ 'max'	=> 2, 'default' => 2 ] );
    }

    public function admin_enqueue_scripts()
    {
        wp_enqueue_script('post');
    }

    function admin_head()
    {
        $field_groups = acf_get_field_groups( [
            'options_page' => $this->page['menu_slug']
        ] );

        // notices
        if( !empty( $_GET['message'] ) && $_GET['message'] == '1' ) {
            acf_add_admin_notice( $this->page['updated_message'], 'success' );
        }

        // add submit div
        add_meta_box( 'submitdiv', __( 'Publish', 'ohio-extra' ), [ $this, 'postbox_submitdiv' ], 'acf_options_page', 'side', 'high' );

        if ( empty( $field_groups ) ) {
            acf_add_admin_notice( sprintf( __( 'No Custom Field Groups found for this options page. <a href="%s">Create a Custom Field Group</a>', 'ohio-extra' ), admin_url( 'post-new.php?post_type=acf-field-group' ) ), 'warning' );
        } else {
            foreach( $field_groups as $i => $field_group ) {
                // vars
                $id = "acf-{$field_group['key']}";
                $title = $field_group['title'];
                $context = $field_group['position'];
                $priority = 'high';
                $args = [ 'field_group' => $field_group ];

                // tweaks to vars
                if ( $context == 'acf_after_title' ) {
                    $context = 'normal';
                } elseif ( $context == 'side' ) {
                    $priority = 'core';
                }

                // add meta box
                add_meta_box( $id, $title, [ $this, 'postbox_acf' ], 'acf_options_page', $context, $priority, $args );
            }
        }
    }

    function postbox_submitdiv( $post, $args )
    {
        do_action( 'acf/options_page/submitbox_before_major_actions', $this->page );
        ?>
        <div id="major-publishing-actions">
            <div id="publishing-action">
                <span class="spinner"></span>
                <input type="submit" accesskey="p" value="<?php echo $this->page['update_button']; ?>" class="button button-primary button-large" id="publish" name="publish">
            </div>

            <?php do_action( 'acf/options_page/submitbox_major_actions', $this->page ); ?>
            <div class="clear"></div>
        </div>
        <?php
    }

    function postbox_acf( $post, $args )
    {
        extract( $args ); // all variables from the add_meta_box function
        extract( $args ); // all variables from the args argument

        $o = array(
            'id'			=> $id,
            'key'			=> $field_group['key'],
            'style'			=> $field_group['style'],
            'label'			=> $field_group['label_placement'],
            'editLink'		=> '',
            'editTitle'		=> __('Edit field group', 'ohio-extra'),
            'visibility'	=> true
        );

        if ( $field_group['ID'] && acf_current_user_can_admin() ) {
            $o['editLink'] = admin_url('post.php?post=' . $field_group['ID'] . '&action=edit');
        }

        $fields = acf_get_fields( $field_group );

        // render
        acf_render_fields( $fields, $this->page['post_id'], 'div', $field_group['instruction_placement'] );

        ?>
            <script type="text/javascript">
                if ( typeof acf !== 'undefined' ) {
                    acf.newPostbox(<?php echo json_encode($o); ?>);	
                }
            </script>
        <?php
    }
}
$ohio_acf_admin_options = new Ohio_ACF_Admin_Options_Page();
