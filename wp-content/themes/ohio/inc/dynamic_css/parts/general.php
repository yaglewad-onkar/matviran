<?php
/*
	General styles
	
	Table of contents: (you can use search)
	# 1. Variables

	# 3. View
*/

# 1. Variables

$selection_color = false;
$links_color = false;
$borders_color = false;
$backgrounds_color = false;
$dark_mode_background = false;

$selection_css = '';
$links_css = '';
$borders_css = '';
$backgrounds_css = '';
$dark_mode_background_css = '';


# 2. Global colors

## 2.1 Brand color

$brand_color = OhioOptions::get_global( 'page_brand_color' );
if ( $brand_color ) {
    $_selector = [
        '.brand-color',
        '.brand-color-i',
        '.brand-color-hover-i:hover',
        '.brand-color-hover:hover',
        '.has-brand-color-color',
        '.is-style-outline .has-brand-color-color',
        'a:hover',

        '.nav .nav-item.active-main-item > a',
        '.nav .nav-item.active > a',
        '.nav .current-menu-ancestor > a',
        '.nav .current-menu-item > a',
        '.hamburger-nav .menu li.current-menu-ancestor > a > span',
        '.hamburger-nav .menu li.current-menu-item > a > span',

        '.blog-grid:not(.blog-grid-type-2):not(.blog-grid-type-4):hover h3 a',
        '.portfolio-item.grid-2:hover h4.title',
        '.fullscreen-nav li a:hover',
        '.socialbar.inline a:hover',
        '.gallery .expand .ion:hover',
        '.close .ion:hover',
        '.accordionItem_title:hover',
        '.tab .tabNav_link:hover',
        '.widget .socialbar a:hover',
        '.social-bar .socialbar a:hover',
        '.share-bar .links a:hover',
        '.widget_shopping_cart_content .buttons a.button:first-child:hover',
        'span.page-numbers.current',
        'a.page-numbers:hover',
        '.comment-content a',
        '.page-headline .subtitle b:before',
        'nav.pagination li .page-numbers.active',
        '.woocommerce .woo-my-nav li.is-active a',
        '.portfolio-sorting li a.active',
        '.widget_nav_menu .current-menu-item > a',
        '.widget_pages .current-menu-item > a',
        '.portfolio-item-fullscreen .portfolio-details-date:before',
        '.btn.btn-link:hover',
        '.blog-grid-content .category-holder:after',
        '.clb-page-headline .post-meta-estimate:before',
        '.comments-area .comment-date-and-time:after',
        '.post .entry-content a:not(.wp-block-button__link)',
        '.project-page-content .date:before',
        '.pagination li .btn.active',
        '.pagination li .btn.current',
        '.pagination li .page-numbers.active',
        '.pagination li .page-numbers.current',
        '.category-holder:not(.no-divider):after', 
        '.inline-divider:after',
        '.hamburger-nav .menu .nav-item:hover > a.menu-link .ion',
        '.hamburger-nav .menu .nav-item .visible > a.menu-link .ion', 
        '.hamburger-nav .menu .nav-item.active > a.menu-link .ion', 
        '.hamburger-nav .menu .sub-nav-item:hover > a.menu-link .ion', 
        '.hamburger-nav .menu .sub-nav-item .visible > a.menu-link .ion', 
        '.hamburger-nav .menu .sub-nav-item.active > a.menu-link .ion',
        '.widgets a',
        '.widgets a *:not(.fab)',
        '.pricing:hover .pricing_price_title',
        '.btn-link:focus, a.btn-link:focus',
        '.btn-link:active, a.btn-link:active',
        '.pricing_list_item .ion',
        'a.highlighted',
        '.woocommerce .woocommerce-privacy-policy-text a',
        '.blog-grid-type-6 .category-holder a.category'
    ];
    $_css = 'color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    $_selector = [
        '.brand-border-color',
        '.brand-border-color-hover',
        '.has-brand-color-background-color',
        '.is-style-outline .has-brand-color-color',
        '.wp-block-button__link:hover',
        '.custom-cursor .circle-cursor--outer',
        '.btn-brand, .btn:not(.btn-link):hover',
        '.btn-brand:active, .btn:not(.btn-link):active',
        '.btn-brand:focus, .btn:not(.btn-link):focus',
        'a.button:hover',
        'button.button:hover',
        '.pricing:hover .btn.btn-brand'
    ];
    $_css = 'border-color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    $_selector = [
        '.brand-bg-color',
        '.brand-bg-color-after',
        '.brand-bg-color-before',
        '.brand-bg-color-hover',
        '.brand-bg-color-i',
        '.brand-bg-color-hover-i',
        '.btn-brand:not(.btn-outline)',
        '.has-brand-color-background-color',
        'a.brand-bg-color',
        '.wp-block-button__link:hover',
        '.widget_price_filter .ui-slider-range',
        '.widget_price_filter .ui-slider-handle:after',
        '.nav .nav-item:before',
        '.nav .nav-item.current-menu-item:before',
        '.widget_calendar caption',
        '.tag:not(.tag-portfolio):hover',
        '.page-headline .tags .tag',
        '.radio input:checked + .input:after',
        '.menu-list-details .tag',
        '.custom-cursor .circle-cursor--inner',
        '.custom-cursor .circle-cursor--inner.cursor-link-hover',
        '.btn-round:before',
        '.btn:not(.btn-link):hover',
        '.btn:not(.btn-link):active',
        '.btn:not(.btn-link):focus',
        'button.button:not(.btn-link):hover',
        'a.button:not(.btn-link):hover',
        '.btn.btn-flat:hover',
        '.btn.btn-flat:focus',
        '.btn.btn-outline:hover',
        'nav.pagination li .btn.active:hover',
        '.tag:not(body):hover',
        '.tag-cloud-link:hover',
        '.pricing_price_time:hover',
        '.pricing:hover .btn.btn-brand'
    ];
    $_css = 'background-color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2.2 Cursor selection color

$selection_color = OhioOptions::get_global( 'page_selection_color' );
if ( $selection_color ) {
	$selection_css = 'background-color:' . $selection_color . ';';
}

## 2.3 Links color

$links_color = OhioOptions::get_global( 'page_links_color' );
if ( $links_color ) {
	$links_css = 'color:' . $links_color . ';';
}

## 2.4 Borders color

$borders_color = OhioOptions::get_global( 'page_borders_color' );
if ( $borders_color ) {
	$borders_css = 'border-color:' . $borders_color . ';';
}

## 2.5 Fill background color

$backgrounds_color = OhioOptions::get_global( 'page_backgrounds_color' );
if ( $backgrounds_color ) {
	$backgrounds_css = 'background-color:' . $backgrounds_color . ';';
}

## 2.6 Dark mode background color

$dark_mode_background = OhioOptions::get_global( 'page_dark_mode_background_color' );
if ( $dark_mode_background ) {
    $dark_mode_background_css = 'background-color:' . $dark_mode_background . ';';
}


# 3. View

## 3.2 Cursor selection color


if ( $selection_css ) {
	$_selector = [
		'::selection'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $selection_css );
}

## 3.3 Links color

if ( $links_css ) {
	$_selector = [
		'a',
		'.post .entry-content a:not(.wp-block-button__link)'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $links_css );
}

## 3.4 Borders color

if ( $borders_css ) {
	$_selector = [
		'.header',
		'.site-footer .page-container + .site-info .wrap',
		'.woo_c-product .woo_c-product-details-variations',
		'.widget_shopping_cart_content .total',
		'.portfolio-project .project-meta li',
		'.widget_shopping_cart_content .mini_cart_item'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $borders_css );
}

## 3.5 Fill background color

if ( $backgrounds_css ) {
	$_selector = [
		'.comments-container',
		'.woo_c-product .single-product-tabs .tab-items-container',
		'.single-post .widget_ohio_widget_about_author',
		'.blog-grid.boxed .blog-grid-content',
		'.portfolio-item-grid.portfolio-grid-type-1.boxed .portfolio-item-details',
		'.site-footer'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $backgrounds_css );
}

## 3.6 Dark mode background color

if ( $dark_mode_background_css ) {
    $_selector = [
        '.dark-scheme',
        '.dark-scheme.with-boxed-container .site',
		'.dark-scheme .site-content',
        '.dark-scheme .header:not(.-mobile).header-5',
        '.dark-scheme .site-footer', 
        '.dark-scheme .horizontal_accordionItem', 
        '.dark-scheme .clb-page-headline:before',
		'.dark-scheme [class*="type"] .woo_c-product-details'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $dark_mode_background_css );
}