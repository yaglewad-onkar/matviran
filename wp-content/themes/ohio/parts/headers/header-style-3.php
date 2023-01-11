<?php
	// Settings
	$is_fixed = OhioOptions::get( 'page_header_menu_fixed', true );
	$mobile_is_fixed = OhioOptions::get_global( 'page_header_mobile_menu_fixed' );
	$fixed_initial_offset = OhioOptions::get_global( 'page_header_fixed_initial_offset' );
	$use_wrapper = OhioOptions::get( 'page_header_menu_use_wrapper', true );
	$show_subheader = OhioSettings::subheader_is_displayed();
	$mobile_search_visibility = OhioOptions::get( 'page_mobile_search_visibility', true );
	$hamburger_position = OhioOptions::get_global( 'page_header_menu_position', 'left' );
	$mobile_hamburger_position = OhioOptions::get_global( 'page_header_mobile_menu_position', 'left' );
	$menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
	$header_dynamic_typo = OhioOptions::get( 'page_header_dynamic_typography_color', false );
	
	$header_classes = '';

	if ( $show_subheader ) { 
		$header_classes .= ' subheader_included'; 
	}
	if ( !$mobile_search_visibility ) {
		$header_classes .= ' without-mobile-search';
	}
	if ( $header_dynamic_typo ) {
		$header_classes .= ' header-dynamic-typo';
	}

	if ($mobile_hamburger_position != $hamburger_position) {
		$header_classes .= ' hamburger-position-' . $hamburger_position  . ' mobile-hamburger-position-' . $mobile_hamburger_position; 
	}

	$is_hamburger = $menu_type == 'full' ? false : true;

	if ( $menu_type == "both" ) {
		$header_classes .= ' both-types';
	} else if ($menu_type == "full") {
		$header_classes .= ' extended-menu';
	}

?>

<header id="masthead" class="header header-3<?php echo esc_attr( $header_classes ); ?>"
<?php if ( $is_fixed ) { echo ' data-header-fixed="true"'; } ?>
<?php if ( $mobile_is_fixed ) { echo ' data-mobile-header-fixed="true"'; } ?>
<?php if ( $fixed_initial_offset ) { echo ' data-fixed-initial-offset="' . $fixed_initial_offset . '"'; } ?>>
	<div class="header-wrap<?php if ( $use_wrapper ) { echo ' page-container'; } ?>">
		<div class="header-wrap-inner">
			<div class="left-part">
				<?php if ( $hamburger_position == 'left' && $is_hamburger): ?>
					<div class="desktop-hamburger -left">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>
				<?php if ( $mobile_hamburger_position == 'left' ): ?>
					<div class="mobile-hamburger -left">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>

	        	<?php get_template_part( 'parts/elements/menu_logo' ); ?>	
			</div>

	        <div class="right-part right">
	            <?php get_template_part( 'parts/elements/menu_nav' ); ?>
	            <?php get_template_part( 'parts/elements/menu_optional' ); ?>
	            
				<?php if ( $hamburger_position == 'right' && $is_hamburger): ?>
					<div class="desktop-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>
				<?php if ( $mobile_hamburger_position == 'right' ): ?>
					<div class="mobile-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' );?>
					</div>
				<?php endif; ?>

	            <div class="close-menu"></div>
	        </div>
	    </div>
	</div>
</header>

<?php get_template_part( 'parts/elements/menu_hamburger_fullscreen' ); ?>