<?php

    if ( OhioSettings::is_coming_soon_page() ) return;

    $left_bar_list = [];
    $right_bar_list = [];

    // Scroll top
    ob_start();
    get_template_part( 'parts/elements/scroll_top' );
    $scroll_top_content = ob_get_clean();

    if ( !empty( $scroll_top_content ) ) {
        if ( OhioOptions::get_global( 'page_arrow_position', 'left' ) == 'left' ) {
            $left_bar_list[] = $scroll_top_content;
        } else {
            $right_bar_list[] = $scroll_top_content;
        }
    }

    // Social networks
    ob_start();
    get_template_part( 'parts/elements/social_networks' );
    $social_networks_content = ob_get_clean();

    if ( !empty( $social_networks_content ) ) {
        if ( OhioOptions::get_global( 'social_network_position', 'right' ) == 'left' ) {
            $left_bar_list[] = $social_networks_content;
        } else {
            $right_bar_list[] = $social_networks_content;
        }
    }

    // Color mode switcher
    ob_start();
    get_template_part( 'parts/elements/light_dark_switcher' );
    $color_switcher_content = ob_get_clean();

    if ( !empty( $color_switcher_content ) ) {
        if ( OhioOptions::get_global( 'page_dark_mode_switcher_position', 'left' ) == 'left' ) {
            $left_bar_list[] = $color_switcher_content;
        } else {
            $right_bar_list[] = $color_switcher_content;
        }
    }
?>

<?php if ( !empty( $left_bar_list ) ): ?>
    <ul class="elements-bar left">
        <?php foreach ( $left_bar_list as $item ): ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ( !empty( $right_bar_list ) ): ?>
    <ul class="elements-bar right">
        <?php foreach ( $right_bar_list as $item ): ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>