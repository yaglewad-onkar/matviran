<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">

	<?php
		// Start bufferization to compute all dynamic CSS styles to show it before <body>
		// OhioBuffer::start_content_bufferization();

		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'parts/elements/preloader' ); ?>

	<?php get_template_part( 'parts/headers/elements-bar' ); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'ohio' ); ?></a>
		<?php if ( OhioOptions::get( 'page_use_boxed_wrapper', false ) ) : ?>
		<div class="boxed-container">
		<?php endif; ?>

		<?php if ( !OhioHelper::is_optimized_flow( 'header' ) ): ?>

		<?php get_template_part( 'parts/headers/subheader' ); ?>

		<?php
			$header_menu_style = OhioOptions::get( 'page_header_menu_style', 'style1' );
			$show_header = OhioOptions::get( 'page_header_visibility', true ) && !OhioSettings::page_is( 'for_builder' ) && !OhioSettings::is_coming_soon_page();
			$append_header_cap = OhioOptions::get( 'page_header_add_cap', true );
			$append_subheader = OhioSettings::subheader_is_displayed();
			$show_search = OhioOptions::get( 'page_header_search_visibility', true ) && !OhioSettings::is_coming_soon_page();
			$mobile_menu = OhioOptions::get_global( 'page_mobile_menu_initial_resolution' ); 
			$header_cap_class = '';


			if ( $header_menu_style == 'style3' ) {
				$header_cap_class .= ' header-2';
			}
			if ( $append_subheader ) {
				$header_cap_class .= ' subheader_included';
			}

			if ( $show_header ) {
				switch ( $header_menu_style ) {
					case 'style1' :
						get_template_part( 'parts/headers/header', 'style-1' );
						break;
					case 'style2' :
						get_template_part( 'parts/headers/header', 'style-2' );
						break;
					case 'style3' :
						get_template_part( 'parts/headers/header', 'style-3' );
						break;
					case 'style4' :
						get_template_part( 'parts/headers/header', 'style-4' );
						break;
					case 'style5' :
						get_template_part( 'parts/headers/header', 'style-5' );
						break;
					case 'style6' :
						get_template_part( 'parts/headers/header', 'style-6' );
						break;
					case 'style7' :
						get_template_part( 'parts/headers/header', 'style-7' );
						break;
					default :
						get_template_part( 'parts/headers/header', 'style-1' );
						break;
				}
			}
		?>

		<?php if ( $show_search ) : ?>
		<div class="clb-popup clb-search-popup">
			<div class="close-bar">
				<div class="btn-round clb-close" tabindex="0">
					<i class="ion ion-md-close"></i>
				</div>
			</div>
			<div class="search-holder">
				<?php
				$search_type = OhioSettings::get('page_header_search_type', 'global');
				if ($search_type == 'woo') {
					if (function_exists('get_product_search_form')) {
						get_product_search_form( true );
					} else {
						get_search_form();
					}
				} else {
					get_search_form();
				}
				?>
			</div>
		</div>
		<?php endif; ?>

		<?php endif; ?>

		<?php if ( isset( $header_menu_style ) && $header_menu_style == 'style6' ) : ?>
		<div class="content-right">
		<?php endif; ?>

		<div id="content" class="site-content" data-mobile-menu-resolution="<?php echo esc_attr(isset($mobile_menu) ? $mobile_menu : ''); ?>">

			<?php if ( isset( $show_header ) && $append_header_cap && $show_header ) : ?>
			<div class="header-cap<?php echo esc_attr( $header_cap_class ); ?>"></div>
			<?php endif; ?>