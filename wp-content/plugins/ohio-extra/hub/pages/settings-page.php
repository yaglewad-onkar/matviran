<?php
    $ohio_settings_slugs = [
        'General' => 'theme-general',
        'Typography' => 'theme-general-typography',
        'Menu' => 'theme-general-menu',
        'Header' => 'theme-general-header',
        'Page' => 'theme-general-pages',
        'Footer' => 'theme-general-footer',
        'Blog' => 'theme-general-blog',
        'Post' => 'theme-general-post',
        'Portfolio' => 'theme-general-portfolio',
        'Shop' => 'theme-general-woocommerce',
        'Product' => 'theme-general-product',
        'Custom CSS' => 'theme-general-custom',
        'Other' => 'theme-general-other'
    ];

    function ohio_show_sync_langs_options_button() {
        if ( ! function_exists( 'icl_get_languages' ) ) return;
        if ( empty( $_GET['lang'] ) ) return;

        $langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');
        $default_lang = get_option( 'icl_sitepress_settings' )['default_language'];

        if ( in_array( ICL_LANGUAGE_CODE, [$default_lang, 'all'] ) ) return;

        ?>
        <div id="sync-languages-action" lang-code="<?php echo esc_attr(ICL_LANGUAGE_CODE); ?>" class="button-publish-holder" style="margin-right:16px">
            <button class="button button-publish button-primary" style="background:transparent;color:#3D84FC">
                <?php echo __( 'Copy main language settings to', 'ohio-extra' ) . ' ' . $langs[ICL_LANGUAGE_CODE]['translated_name']; ?>
            </button>
        </div>
        <?php
    }
?>

<div class="wp-header-end"></div><!-- WP notices here -->

<div class="clb-hub clb-page">
    <div class="clb-hub-intro">
        <div class="clb-hub-container clb-page-container">
            <div class="details">
                <i class="details-icon"></i>
                <h1><?php _e( 'Theme Settings', 'ohio-extra' ); ?></h1>
            </div>
            <div class="mode-switcher-holder">
                <?php ohio_show_sync_langs_options_button(); ?>
               <div class="mode-switcher">
                    <a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-extra' ); ?></a>
                    <a href="admin.php?page=ohio_hub_settings" class="btn"><?php _e( 'Theme Settings', 'ohio-extra' ); ?></a>
                </div>
                <div id="fake-publishing-action" class="button-publish-holder">
                    <button class="button button-publish button-primary">
                        <?php _e( 'Update', 'ohio-extra' ); ?>
                    </button>
                </div> 
            </div>
        </div>
    </div>

<?php
    $options_slug = !empty( $_GET['options_page'] ) ? $_GET['options_page'] : 'theme-general';

    $page = acf_get_options_page( $options_slug );
    $post_id = acf_get_valid_post_id( $page['post_id'] );
?>
    <div class="clb-hub-container clb-page-container">
        <div class="clb-nav">
            <ul class="clb-block-layout clb-nav-inner">
                <?php foreach( $ohio_settings_slugs as $slug_key => $slug ): ?>
                <li>
                    <a <?php if ( $options_slug == $slug ) { echo 'class="selected"'; } ?> 
                        href="admin.php?page=ohio_hub_settings&options_page=<?php echo $slug; ?>">
                        <?php echo $slug_key; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="clb-hub-container clb-page-container">
        <div class="wrap acf-settings-wrap">
            <form id="post" method="post" name="post">
                <?php 
                    acf_form_data( [
                        'screen' => 'options',
                        'post_id' => $post_id,
                    ] );

                    wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
                    wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
                ?>

                <div id="poststuff" class="poststuff">
                    <div id="post-body" class="metabox-holder columns-1">
                        <div id="postbox-container-1" class="postbox-container" style="display: none;">

                            <div id="major-publishing-actions">
                                <div id="publishing-action">
                                    <span class="spinner"></span>
                                    <input type="submit" accesskey="p" value="Update" class="button button-primary button-large" id="publish" name="publish">
                                </div>
                                <div class="clear"></div>
                            </div>

                            <?php // do_meta_boxes( 'acf_options_page', 'side', null ); ?>

                        </div>

                        <div id="postbox-container-2" class="postbox-container">
                            <?php do_meta_boxes( 'acf_options_page', 'normal', null ); ?>
                        </div>
                    </div>

                    <br class="clear">
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="clb-page-footer">
        <div class="clb-page-container">
            <div class="copyright">
                Copyright © <?php echo date("Y"); ?>, Ohio Version <?php
                        $ohio_theme = wp_get_theme( get_template() );
                        $ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
                        echo $ohio_version;
                    ?> by <a target="_blank" href="https://themeforest.net/user/colabrio">Colabrio</a>.
            </div>
            <div class="social-networks">
                <a target="_blank" href="https://docs.clbthemes.com/ohio/">Documentation</a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/">Help Center</a>&nbsp;|&nbsp;Follow Us -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> Facebook</a>
            </div>  
        </div>
    </div>
</div>