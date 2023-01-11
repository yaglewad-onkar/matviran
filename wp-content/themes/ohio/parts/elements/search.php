<?php
	$show_search = OhioOptions::get( 'page_header_search_visibility', true );
	$search_position = OhioOptions::get( 'page_header_search_position', 'standard' );
?>

<?php if ( $show_search ) : ?>
	<a class="search-global btn-round btn-round-light<?php if ( $search_position == "fixed" ) echo ' fixed btn-round-light vc_hidden-md vc_hidden-sm vc_hidden-xs';?>" tabindex="1" data-nav-search="true">
		<i class="icon ion ion-md-search brand-color-hover-i"></i>
	</a>
<?php endif; ?>