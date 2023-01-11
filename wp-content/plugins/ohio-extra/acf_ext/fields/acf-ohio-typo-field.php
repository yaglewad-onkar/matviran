<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( ! class_exists( 'acf_field_ohio_typo' ) ) :


function reset_fonts_typo( $value, $post_id, $field  ) {
    return '';
}
function on_update_font_type( $value, $post_id, $field  ) {
    if ( OhioOptions::get_global( 'page_font_type', 'google_fonts') != $value ) {
        add_filter('acf/update_value/name=global_page_text_typo', 'reset_fonts_typo', 10, 3);
        add_filter('acf/update_value/name=global_page_headings_typo', 'reset_fonts_typo', 10, 3);
        add_filter('acf/update_value/name=global_page_subtitles_typo', 'reset_fonts_typo', 10, 3);
    }
    return $value;
}
add_filter('acf/update_value/key=field_59229bd23ssaf154235', 'on_update_font_type', 10, 3);





class acf_field_ohio_typo extends acf_field {

	
	function __construct( $settings ) {

		$this->name = 'ohio_typo';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio Typography', 'ohio-extra' );
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'add_theme_inherited' => false
		);
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> esc_html__( 'Error! Please enter a higher value', 'ohio-extra' ),
		);
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;

		// ----------------------------------------------------------------------------------------------------

		include( $this->settings['path'] . 'ajax_gf_list.php' );

		// do not delete!
    	parent::__construct();
	}

	function render_field( $field ) {

		$fonts_type = OhioOptions::get_global( 'page_font_type', 'google_fonts' );
		switch ( $fonts_type ) {
			case 'adobe_fonts':
				include( $this->settings['path'] . 'af_list.php' );
				break;
			case 'manual_custom_fonts':
				include( $this->settings['path'] . 'cf_list.php' );
				break;
			case 'google_fonts':
			default:
				include( $this->settings['path'] . 'gf_list.php' );
				break;
		}

		$field_value = false;
		if ( $field['value'] ) {
			$field_value = json_decode( $field['value'] );
		}

		$text = acf_get_sub_array( $field, array('id', 'class', 'name', 'value') );
		$hidden = acf_get_sub_array( $field, array('name', 'value') );
		$uniqid = uniqid( 'ohio-typo' );

		$use_inheritance = $field['add_theme_inherited'] ?? false;
		$inherited = $use_inheritance ? ( $field['value'] == 'inherit' ) : false;
?>

		<div class="ohio-acf-typo-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<!-- Hidden field -->
			<?php acf_hidden_input( $hidden ); ?>

			<?php if ( $use_inheritance ): ?>
				<div class="typography_inheritance_row">
					<label>
						<input type="radio" name="<?php echo $field['value'] . '--inheritance' ?>" 
							<?php if ( $inherited ) echo 'checked'; ?>
							value="inherit">
						<?php esc_html_e( 'Use from Theme Settings', 'ohio-extra' ); ?>
					</label>
					<label>
						<input type="radio" name="<?php echo $field['value'] . '--inheritance' ?>" 
							<?php if ( !$inherited ) echo 'checked'; ?>
							value="custom">
							<?php esc_html_e( 'Custom', 'ohio-extra' ); ?>
					</label>
				</div>
			<?php endif; ?>

			<div class="row" <?php if ( $inherited ) echo 'style="display:none;"'; ?>>

				<!-- Font size -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font size', 'ohio-extra' ); ?> <span><?php esc_html_e( 'Use CSS units', 'ohio-extra' ); ?> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a></span></strong>
					<input type="text" name="typo-size"<?php if ( is_object( $field_value ) && isset( $field_value->size ) ) { echo ' value="' . $field_value->size . '"'; } ?>>
				</div>

				<!-- Font style -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font style', 'ohio-extra' ); ?></strong>
					<select name="typo-style">
						<option value="">- <?php esc_html_e( 'not selected', 'ohio-extra' ); ?> -</option>
						<option value="inherit" <?php if ( is_object( $field_value ) && isset( $field_value->style ) && $field_value->style == 'inherit' ) { echo ' selected'; } ?>><?php esc_html_e( 'Inherit', 'ohio-extra' ); ?></option>
						<option value="normal"<?php if ( is_object( $field_value ) && isset( $field_value->style ) && $field_value->style == 'normal' ) { echo ' selected'; } ?>><?php esc_html_e( 'Normal', 'ohio-extra' ); ?></option>
						<option value="italic"<?php if ( is_object( $field_value ) && isset( $field_value->style ) && $field_value->style == 'italic' ) { echo ' selected'; } ?>><?php esc_html_e( 'Italic', 'ohio-extra' ); ?></option>
						<option value="oblique"<?php if ( is_object( $field_value ) && isset( $field_value->style ) && $field_value->style == 'oblique' ) { echo ' selected'; } ?>><?php esc_html_e( 'Oblique', 'ohio-extra' ); ?></option>
					</select>
				</div>

				<!-- Font color -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font color', 'ohio-extra' ); ?></strong>
					<input type="text" name="typo-color" class="cs-wp-color-picker"<?php if ( is_object( $field_value ) && isset( $field_value->color ) ) { echo ' value="' . $field_value->color . '"'; } ?>>
				</div>

			</div>

			<div class="row" <?php if ( $inherited ) echo 'style="display:none;"'; ?>>
				
				<!-- Line height -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Line height', 'ohio-extra' ); ?> <span><?php esc_html_e( 'Use CSS units', 'ohio-extra' ); ?> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a></span></strong>
					<input type="text" name="typo-height"<?php if ( is_object( $field_value ) && isset( $field_value->height ) ) { echo ' value="' . $field_value->height . '"'; } ?>>
				</div>

				<!-- Font weight -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font weight', 'ohio-extra' ); ?></strong>
					<select name="typo-weight" id="">
						<option value="">- <?php esc_html_e( 'not selected', 'ohio-extra' ); ?> -</option>
						<option value="100"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '100' ) { echo ' selected'; } ?>>100 Thin</option>
						<option value="200"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '200' ) { echo ' selected'; } ?>>200 Extra-light</option>
						<option value="300"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '300' ) { echo ' selected'; } ?>>300 Light</option>
						<option value="400"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '400' ) { echo ' selected'; } ?>>400 Regular</option>
						<option value="500"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '500' ) { echo ' selected'; } ?>>500 Medium</option>
						<option value="600"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '600' ) { echo ' selected'; } ?>>600 Semi-bold</option>
						<option value="700"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '700' ) { echo ' selected'; } ?>>700 Bold</option>
						<option value="800"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '800' ) { echo ' selected'; } ?>>800 Extra-bold</option>
						<option value="900"<?php if ( is_object( $field_value ) && isset( $field_value->weight ) && $field_value->weight == '900' ) { echo ' selected'; } ?>>900 Black</option>
					</select>
				</div>

				<!-- Letter spacing -->
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Letter spacing' ,'ohio-extra' ); ?> <span><?php esc_html_e( 'Use CSS units', 'ohio-extra' ); ?> <a href="https://www.w3schools.com/cssref/css_units.asp" target="_blank">[?]</a></span></strong>
					<input type="text" name="typo-spacing"<?php if ( is_object( $field_value ) && isset( $field_value->spacing ) ) { echo ' value="' . $field_value->spacing . '"'; } ?>>
				</div>

			</div>

			<div class="row font-picker" <?php if ( $inherited ) echo 'style="display:none;"'; ?>>
				<div class="pick_blocker">
					<div class="preloader">
						<div class="circ1"></div>
						<div class="circ2"></div>
						<div class="circ3"></div>
						<div class="circ4"></div>
					</div>
				</div>

				<!-- Font family -->
				<?php $current_font_object = false;?>

				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font family', 'ohio-extra' ); ?>
                        <?php if ($fonts_type == 'google_fonts') { ?>
                        <span><?php esc_html_e( 'See more on', 'ohio-extra' ); ?> <a href="#">Google Fonts</a></span>
                        <?php } ?>
                    </strong>
					<select name="typo-font-family">
						<option value="">- <?php esc_html_e( 'theme settings inherited', 'ohio-extra' ); ?> -</option>
                        <?php
                        if ($fonts_type == 'google_fonts') {
                        ?>
						<optgroup label="Recommended for headings">
							<option value="Space Grotesk"><?php esc_html_e( 'Space Grotesk', 'ohio-extra' ); ?></option>
							<option value="Montserrat"><?php esc_html_e( 'Montserrat', 'ohio-extra' ); ?></option>
							<option value="Playfair Display"><?php esc_html_e( 'Playfair Display', 'ohio-extra' ); ?></option>
						</optgroup>
						<optgroup label="Recommended for paragraphs">
							<option value="Open Sans"><?php esc_html_e( 'Open Sans', 'ohio-extra' ); ?></option>
							<option value="Roboto"><?php esc_html_e( 'Roboto', 'ohio-extra' ); ?></option>
							<option value="Rubik"><?php esc_html_e( 'Rubik', 'ohio-extra' ); ?></option>
						</optgroup>
						<option disabled>&mdash;&mdash;&mdash;</option>
                        <?php } ?>
						<?php
							$have_family = false;
							foreach ( $ohio_gf_object->items as $font_object ) {
								echo '<option value="' . $font_object->family . '"';
								if ( is_object( $field_value ) && isset( $field_value->font_family ) && $field_value->font_family == $font_object->family ) {
									$have_family = true;
									echo ' selected';
									$current_font_object = $font_object;
								}
								echo '>' . ucfirst($font_object->family) . '</option>';
							}
						?>
					</select>
					<div class="font-preview" data-attr="typo-preview" <?php echo 'style="' . ( ( $have_family ) ? 'font-family: \'' . $current_font_object->family . '\', sans-serif;' : ' display: none' ) . '"'; ?>>
						<?php esc_html_e( 'Font preview. Hey there!', 'ohio-extra' ); ?>
					</div>
					<?php if ( $have_family ) : ?>
						<script>
							(function($){
								var font_link  = document.createElement( 'link' );
								font_link.type = 'text/css';
								font_link.id   = "<?php echo $uniqid ?>";
								font_link.rel  = 'stylesheet';

                                <?php switch ($fonts_type) {
                                    case 'adobe_fonts': ?>
                                        font_link.href = "<?php echo 'https://use.typekit.net/' . OhioOptions::get_global( 'adobekit_url' ) . '.css'  ?>";
										<?php break;
									case 'manual_custom_fonts': ?>
                                        font_link.href = "<?php echo 'https://use.typekit.net/' . OhioOptions::get_global( 'adobekit_url' ) . '.css'  ?>";
                                        <?php break;
                                    case 'google_fonts': ?>
                                        font_link.href = 'https://fonts.googleapis.com/css?family=<?php echo preg_replace( '/\s/', '+', $current_font_object->family); ?>';
                                        <?php break;
                                    default: ?>
                                        font_link.href = 'https://fonts.googleapis.com/css?family=<?php echo preg_replace( '/\s/', '+', $current_font_object->family); ?>';
                                        <?php break;
                                } ?>

								$( 'head' ).append( $( font_link ) );
							})(jQuery);
						</script>
					<?php endif; ?>
				</div>
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font variants', 'ohio-extra' ); ?></strong>
					<div class="checkboxes variants_value">
						<?php 
							$have_variants = false;
							if ( $current_font_object && isset( $current_font_object->variants ) && count( $current_font_object->variants ) > 0 ) {
								$have_variants = true;
								foreach ( $current_font_object->variants as $variant ) {
									echo '<div class="checkbox_row">';
									echo '<label><input type="checkbox" name="' . $variant . '"';
									if ( isset( $field_value->font_variants ) && is_array( $field_value->font_variants ) && ( in_array( $variant, $field_value->font_variants ) ) ) {
										echo ' checked';
									}
									echo '> ' . $variant . '</label>';
									echo '</div>';
								}
							}
						?>
					</div>
					<span class="no_content"<?php if ( $have_variants ) { echo ' style="display: none;"'; } ?>>&hellip; <?php _e( 'First need to select a "Font family" option', 'ohio-extra'); ?></span>
				</div>
				<div class="xl-col3 sm-col1">
					<strong class="label"><?php esc_html_e( 'Font subsets', 'ohio-extra' ); ?></strong>
					<div class="checkboxes subsets_value">
						<?php
							$have_subset = false;
							if ( $current_font_object && isset( $current_font_object->subsets ) && count( $current_font_object->subsets ) > 0 ) {
								$have_subset = true;
								foreach ( $current_font_object->subsets as $subset ) {
									echo '<div class="checkbox_row">';
									echo '<label><input type="checkbox" name="' . $subset . '"';
									if ( isset( $field_value->font_subsets ) && is_array( $field_value->font_subsets ) && ( in_array( $subset, $field_value->font_subsets ) ) ) {
										echo ' checked';
									}
									echo '> ' . $subset . '</label>';
									echo '</div>';
								}
							}
						?>
					</div>
					<span class="no_content"<?php if ( $have_subset ) { echo ' style="display: none;"'; } ?>>&hellip; <?php _e( 'First need to select a "Font family" option', 'ohio-extra'); ?></span>
				</div>
			</div>
		</div>

		<?php
	}


	function input_admin_enqueue_scripts() {
		global $wp_scripts, $wp_styles;

		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// wp_register_style( 'acf-input-ohio', "{$url}assets/css/input.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'acf-input-ohio' );
		
		wp_register_script( 'acf-input-ohio-typo', "{$url}assets/js/input.js", array( 'acf-input' ), $version );
		wp_enqueue_script('acf-input-ohio-typo');

		if ( ! isset( $wp_scripts->registered['iris'] ) ) {
			wp_register_style('wp-color-picker', admin_url( 'css/color-picker.css' ), array(), '', true);
			wp_register_script('iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), '1.0.7', true);
			wp_register_script('wp-color-picker', admin_url( 'js/color-picker.min.js' ), array('iris'), '', true);
		    wp_localize_script('wp-color-picker', 'wpColorPickerL10n', array(
		        'clear'			=> __( 'Clear', 'ohio-extra' ),
		        'defaultString'	=> __( 'Default', 'ohio-extra' ),
		        'pick'			=> __( 'Select Color', 'ohio-extra' ),
		        'current'		=> __( 'Current Color', 'ohio-extra' )
		    ));
		}

		wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_style( 'acf-input-ohio-picker', "{$url}assets/css/cs-wp-color-picker.min.css", array( 'wp-color-picker' ), '1.0.0', 'all' );
	    wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'acf-input-ohio-picker', "{$url}assets/js/cs-wp-color-picker.min.js", array( 'wp-color-picker' ), '1.0.0', true );
	}
	
	
	
	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_typo( $this->settings );

// class_exists check
endif;

?>