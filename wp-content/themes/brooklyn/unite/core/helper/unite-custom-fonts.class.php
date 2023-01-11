<?php if (!defined('UT_VERSION')) {
    exit; // exit if accessed directly
}

class UT_Custom_Font_Manager {
	
	protected $_menu_parent = 'unite-welcome-page';
	protected $_capability  = 'edit_theme_options';
	
	public function __construct() {
		
		$this->register_font_taxonomy();
		
		// add to unite welcome page
		add_action( 'admin_menu', array( &$this, 'register_menu' ), 100 );
		add_action( 'admin_head', array( &$this, 'menu_highlight' ) );
		
		add_filter( 'manage_edit-unite_custom_fonts_columns', array( &$this, 'manage_columns' ) );
		add_filter( 'manage_unite_custom_fonts_custom_column', array( &$this, 'manage_custom_columns' ), 10, 3 );
		add_filter( 'manage_edit-unite_custom_fonts_sortable_columns', array( &$this, 'sortable_columns' ) );		
		
		
		add_action( 'unite_custom_fonts_add_form_fields', array( &$this, 'extra_new_metadata' ) );
		add_action( 'unite_custom_fonts_edit_form_fields', array( &$this, 'extra_edit_metadata' ) );
		
		// save meta data
		add_action( 'edited_unite_custom_fonts', array( &$this, 'save_metadata' ) );
		add_action( 'create_unite_custom_fonts', array( &$this, 'save_metadata' ) );
		
		
		// allow font type upload
		add_filter( 'upload_mimes', array( &$this, 'add_fonts_to_allowed_mimes' ), 10, 2 );
		
	}
	
	public function register_menu() {

        $func = 'add_' . 'submenu_page';

        $func(
			$this->_menu_parent,
			esc_html__( 'Theme Custom Fonts', 'unite-admin' ),
			esc_html__( 'Theme Custom Fonts', 'unite-admin' ),
			$this->_capability,
			'edit-tags.php?taxonomy=unite_custom_fonts'
		);
		
	}
	
	public function menu_highlight() {
		
		global $parent_file, $submenu_file;

		if ( 'edit-tags.php?taxonomy=unite_custom_fonts' === $submenu_file ) {
			$parent_file = $this->_menu_parent;
		}

		if ( !isset( get_current_screen()->id ) || 'edit-unite_custom_fonts' !== get_current_screen()->id ) {
			return;
		}
			
		?>

		<style>
			
			#addtag div.form-field.term-slug-wrap, #edittag tr.form-field.term-slug-wrap { display: none; }
			#addtag div.form-field.term-description-wrap, #edittag tr.form-field.term-description-wrap { display: none; }
			
			.ut-ui-media-wrap,
			.ut-ui-remove-media {
				display: none;
			}
			
			.ut-form-field {
				margin-top: 30px !important;
			}
			
			.ut-form-field + p.submit {
				margin-top: 30px !important;
			}
			
			.ut-form-field .ut-ui-upload-input {
				height: 40px;
				width: 95%;
				max-width: 100%;
				font-size: 13px;
				line-height: 20px;
				font-weight: 400;
				margin: 0;
				padding: 0 10px;
			}
			
			.ut-form-field .ut-ui-button {
				margin-top: 10px;
			}
			
			.ut-form-field h2 {
				margin-bottom: 0;
			}
			
		</style>

		<script>
			jQuery(document).ready( function( $ ) {
				
				var $wrapper = $( '#addtag, #edittag' );
				$wrapper.find( 'tr.form-field.term-name-wrap p, div.form-field.term-name-wrap > p' ).text( '<?php esc_html_e( 'The name of the font used in the attached CSS file.', 'unitedthemes' ); ?>' );
				
			} );
		</script>

		<?php
		
	}
	
	public function manage_columns( $columns ) {
		
		$old_columns = $columns;
		
		$columns = array(
			'cb' => $old_columns['cb'],
			'name' => $old_columns['name'],
			'ID' => esc_html__( 'ID', 'unite-admin' ),
		);

		return $columns;
		
	}

	public function sortable_columns( $sortable_columns ) {
		
		$sortable_columns['ID'] = 'ID';
		return $sortable_columns;
		
	}

	public function manage_custom_columns( $value, $column_name, $term_id ) {
		
		switch ( $column_name ) {
			case 'ID' :
				$value = '#' . $term_id;
				break;
		}

		return $value;
		
	}
	
	protected function default_args( $fonts ) {
		
		return wp_parse_args(
			$fonts,
			array(
				'font_woff'  => '',
				'font_woff2' => '',
				'font_ttf'   => '',
				'font_svg'   => '',
				'font_eot'   => '',
			)
		);
		
	}
	
	public function add_fonts_to_allowed_mimes( $t, $user ) {
		
		if ( current_user_can( $this->_capability ) ) {
			$t['svg']   = 'image/svg+xml';
			$t['woff']  = 'application/octet-stream';
			$t['woff2'] = 'application/octet-stream';
			$t['eot']   = 'application/vnd.ms-fontobject';
			$t['ttf']   = 'application/x-font-ttf';
		}
		
		return $t;
		
	}
	
	protected function register_font_taxonomy() {
		
        $register_font_taxonomy = 'register' . '_' . 'taxonomy';
        
		$labels = array(
			'name' => __( 'Custom Fonts', 'unite-admin' ),
			'singular_name' => __( 'Font', 'unite-admin' ),
			'menu_name' => _x( 'Custom Fonts', 'Admin menu name', 'unite-admin' ),
			'search_items' => __( 'Search Fonts', 'unite-admin' ),
			'all_items' => __( 'All Fonts', 'unite-admin' ),
			'parent_item' => __( 'Parent Font', 'unite-admin' ),
			'parent_item_colon' => __( 'Parent Font:', 'unite-admin' ),
			'edit_item' => __( 'Edit Font', 'unite-admin' ),
			'update_item' => __( 'Update Font', 'unite-admin' ),
			'add_new_item' => __( 'Add New Font', 'unite-admin' ),
			'new_item_name' => __( 'New Font Name', 'unite-admin' ),
		);
		
		$args = array(
			'hierarchical' => false,
			'labels' => $labels,
			'public' => false,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'capabilities' => array( 'edit_theme_options' ),
			'query_var' => false,
			'rewrite' => false,
		);
		
		$register_font_taxonomy(
			'unite_custom_fonts',
			apply_filters( 'unite_taxonomy_objects_custom_fonts', array() ),
			apply_filters( 'unite_taxonomy_args_custom_fonts', $args )
		);		
		
	}
	
	public function extra_new_metadata() {
		
		$this->print_font_new_field( 
			'font_woff', 
			esc_html__( 'Font .woff', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s woff file.', 'unite-admin' )
		);
		
		$this->print_font_new_field( 
			'font_woff2', 
			esc_html__( 'Font .woff2', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s woff2 file.', 'unite-admin' )
		);
		
		$this->print_font_new_field( 
			'font_ttf', 
			esc_html__( 'Font .ttf', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s ttf file.', 'unite-admin' )
		);
		
		$this->print_font_new_field( 
			'font_eot', 
			esc_html__( 'Font .eot', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s eot file.', 'unite-admin' )
		);
		
		$this->print_font_new_field( 
			'font_svg', 
			esc_html__( 'Font .svg', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s svg file.', 'unite-admin' )
		);

		
	}
	
	
	public function extra_edit_metadata( $term ) {
		
		$data = $this->get_font_links( $term->term_id );
		
		$this->print_font_new_edit_field( 
			'font_woff', 
			esc_html__( 'Font .woff', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s woff file', 'unite-admin' ), 
			$data['font_woff'] 
		);
		
		$this->print_font_new_edit_field( 
			'font_woff2', 
			esc_html__( 'Font .woff2', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s woff2 file', 'unite-admin' ), 
			$data['font_woff2'] 
		);
		
		$this->print_font_new_edit_field( 
			'font_ttf', 
			esc_html__( 'Font .ttf', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s ttf file', 'unite-admin' ), $data['font_ttf'] 
		);
		
		$this->print_font_new_edit_field( 
			'font_eot', 
			esc_html__( 'Font .eot', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s eot file', 'unite-admin' ), 
			$data['font_eot'] 
		);
		
		$this->print_font_new_edit_field( 
			'font_svg', 
			esc_html__( 'Font .svg', 'unite-admin' ), 
			esc_html__( 'Upload the font\'s svg file', 'unite-admin' ), 
			$data['font_svg'] 
		);
		
	}
	
	protected function print_font_new_field( $id, $title, $description, $value = '' ) {
		
		echo '<div class="form-field ut-form-field">';
		
			echo '<h2>' . $title . '</h2>';
			echo '<p>' . $description . '</p>';
		
			$field_settings = array(
				'field_id'    => 'edit-' . $id,
				'field_name'  => 'unite_custom_fonts[' . $id . ']',
				'field_label' => $title,
				'field_desc'  => $description,
				'type'        => 'upload',
				'field_value' => '',
				'field_class' => ''
			);

			call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );
		
		echo '</div>';
		
	}
	
	protected function print_font_new_edit_field( $id, $title, $description, $value = '' ) {
		
		echo '<div class="form-field ut-form-field">';
		
			echo '<h2>' . $title . '</h2>';
			echo '<p>' . $description . '</p>';
			
			$field_settings = array(
				'field_id'    => 'edit-' . $id,
				'field_name'  => 'unite_custom_fonts[' . $id . ']',
				'field_label' => $title,
				'field_desc'  => $description,
				'type'        => 'upload',
				'field_value' => esc_attr( $value ),
				'field_class' => ''
			);

			call_user_func( 'ot_type_' . $field_settings['type'], $field_settings );
		
		echo '</div>';
		
	}
	
	public function get_font_links( $term_id ) {
		
		$links = get_option( "taxonomy_unite_custom_fonts_{$term_id}", array() );
		return $this->default_args( $links );
		
	}
	
	public function update_font_links( $posted, $term_id ) {
		
		$links = $this->get_font_links( $term_id );
		
		foreach ( array_keys( $links ) as $key ) {
			
			$links[$key] = isset( $posted[$key] ) ? $posted[$key] : '';			
			
		}
		
		update_option( "taxonomy_unite_custom_fonts_{$term_id}", $links );
		
	}
	
	public function save_metadata( $term_id ) {
		
		if ( isset( $_POST['unite_custom_fonts'] ) ) {
			$this->update_font_links( $_POST['unite_custom_fonts'], $term_id );
		}
		
	}
	
}

new UT_Custom_Font_Manager();