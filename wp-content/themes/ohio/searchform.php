<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for', 'ohio' ) . ':'; ?></span>
		<input autocomplete="off" type="text" class="search-field" name="s" placeholder="<?php esc_attr_e( 'Search...', 'ohio' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
	</label>
	<button type="submit" class="search search-submit">
		<i class="ion ion-md-search"></i>
	</button>
</form>