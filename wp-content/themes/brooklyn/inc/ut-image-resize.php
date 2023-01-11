<?php if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Adaptive Image Class
 */

class UT_Adaptive_Image {

    public static function get_generated_image_size( $url ) {

        if( empty( $url ) || ot_get_option('ut_deactivate_fast_image_size', 'off' ) == 'on' ) {
            return array(0,0);
        }

        global $FastImageSize;

        $FastImageSizes = $FastImageSize->getImageSize( $url );
        return isset( $FastImageSizes['width'] ) && isset($FastImageSizes['height']) ? array( $FastImageSizes['width'], $FastImageSizes['height'] ) : array(0,0);

    }

    public static function create_responsive_placeholder_svg( $width , $height ){

        return 'data:image/svg+xml;charset=utf-8,%3Csvg xmlns%3D\'http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg\' viewBox%3D\'0 0 ' . esc_attr( $width ) . ' ' . esc_attr( $height ) . '\'%2F%3E';

    }

	/**
	 * Single Image Placeholder
	 *
     * @param string $placeholder
	 * @return string
	 */

	public static function create_placeholder( $placeholder = 'blog' ) {

	    $image = array(
            'blog' => 'blog-placeholder-image.jpg'
        );

	    if( empty( $image[$placeholder] ) ) {
	        return '';
        }

        return '<img src="' . self::create_responsive_placeholder_svg( 750, 625 ) . '" width="750" height="625" data-src="' . THEME_WEB_ROOT . '/images/placeholder/' . $image[$placeholder] . '" class="ut-adaptive-image skip-lazy wp-post-image"> ';

    }


    /**
     * Single Image only Lazy Load
     *
     * @param $image
     * @param $size
     * @param $attributes
     *
     * @return string
     */

    public static function create_lazy( $image, $attributes = array(), $size = '' ) {

	    $image_attributes = array();

	    $image_ID = false;

	    // get image
	    if ( is_numeric( $image ) ) {

		    $image_ID = $image;
		    $image    = wp_get_attachment_image_src( $image, $size );

	    } elseif ( ! empty( $image ) ) {

		    $image = array( esc_url( $image ) );

	    }

	    if ( ! $image ) {
		    return '';
	    }

	    // get image size
	    $image_size = self::get_generated_image_size( $image[0] );

	    $image_attributes['src']      = self::create_responsive_placeholder_svg( $image_size[0], $image_size[1] );
	    $image_attributes['data-src'] = esc_url( $image[0] );

	    if( strpos( $image[0], '.svg' ) ) {

        } else {

	        $image_attributes['width']  = esc_attr( $image_size[0] );
	        $image_attributes['height'] = esc_attr( $image_size[1] );

        }

	    // get image alt
	    if ( $image_ID ) {

            $image_alt = get_post_meta( $image_ID, '_wp_attachment_image_alt', true );

            // get caption
            $caption = get_post( $image_ID )->post_excerpt;

            // whether to use alt or caption
            $image_alt = empty( $image_alt ) ? $caption : $image_alt;

            if ( ! empty( $caption ) ) {

                $image_attributes['alt'] = esc_attr( $image_alt );

            }

        }

        $image_attributes = array_merge( $image_attributes, $attributes );

        // data attributes string
	    $image_attributes = implode(' ', array_map(
            function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
            $image_attributes,
            array_keys( $image_attributes )
        ) );

        ob_start(); ?>

        <img <?php echo $image_attributes; ?> class="ut-adaptive-image skip-lazy wp-post-image">

        <?php

        return ob_get_clean();

    }

	/**
	 * Create Background HTML
	 *
	 * @param $background_image
	 * @param $sizes
	 * @param $crop
	 * @param $orientation
	 * @param $force_load
	 * @param $class
	 *
	 * @return string
	 */

	public static function create_background( $background_image = '', $sizes = array(), $crop = false, $orientation = 'landscape', $force_load = false, $class = '' ) {

	    if( is_numeric( $background_image )) {

		    $full_size = wp_get_attachment_url( $background_image );

        } else {

		    $full_size = $background_image;

		    // check if image ID is attached to URL
            $url = parse_url( $full_size, PHP_URL_QUERY );
		    parse_str( $url, $params );

		    if( isset( $params['id'] ) ) {

			    $background_image = $params['id'];

            } else {

			    $background_image = ut_get_attachment_id_from_url( $full_size );

            }

        }

		// image does not exist
		if( !is_string( get_post_status( $background_image ) ) ) {

			return '';

		}

		// image sizes
		if( $orientation == 'portrait' && empty( $sizes ) ) {

			$image_sizes = ut_recognized_portrait_image_sizes( true );

		} elseif( $orientation == 'landscape' && empty( $sizes ) ) {

			$image_sizes = ut_recognized_landscape_image_sizes( true );

		} elseif( $orientation == 'auto' && !empty( $sizes ) ) {

			$img_meta = wp_get_attachment_metadata( $background_image );
			$image_sizes = ut_dynamic_image_sizes( $sizes[0], $sizes[1], $crop, ( $img_meta['width'] > $img_meta['height'] ) ? 'landscape' : 'portrait' );

		} elseif( !empty( $sizes ) ) {

			$image_sizes = ut_dynamic_image_sizes( $sizes[0], $sizes[1], $crop, $orientation );

		}

		// limit sizes 3 = maxsize
		if( isset( $image_sizes ) && isset( $sizes[3] ) ) {

			foreach ( $image_sizes as $width => $height ) {

				if( $width > $sizes[3] ) {

					unset( $image_sizes[$width] );

				}

			}

		}

		// arrays for all images
		$data_responsive_images = array();

		foreach ( $image_sizes as $width => $height ) {

			$data_responsive_images[ $width ] = ipq_get_theme_image_url(
				$background_image,
				array(
					$width,
					$height,
					$crop,
					true
				)
			);

		}

		// array of element attributes
		$background_attributes = array();


		if( !empty( $class ) ) {
			$background_attributes['class'] = $class;
        }

		// all responsive images
		$background_attributes['data-adaptive-images'] = htmlspecialchars( json_encode( $data_responsive_images ), ENT_QUOTES, 'UTF-8' );

		// the original image
		$background_attributes['data-original-images'] = esc_url( $full_size );

		// return adaptive image attributes
		return implode(' ', array_map(
			function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
			$background_attributes,
			array_keys( $background_attributes )
		) );

    }


    /**
     * Create Image HTML
     *
     * @param $image_ID
     * @param $sizes
     * @param $crop
     * @param $orientation
     * @param $force_load
     * @param $class
     *
     * @return string
     */

    public static function create( $image_ID = '', $sizes = array(), $crop = true, $orientation = 'landscape', $force_load = false, $class = '' ) {

        $classes = array( 'ut-adaptive-image', 'wp-post-image', 'skip-lazy', $class );

        if( $image_ID ) {

            $full_size = wp_get_attachment_url( $image_ID );

        } else {

            // featured image
            $full_size = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
            $image_ID  = get_post_thumbnail_id( get_the_ID() );

        }

        // image does not exist - return image placeholder
        if( !is_string( get_post_status( $image_ID ) ) ) {

            return '<img class="' . implode( " ", array_unique( $classes ) ) .'" data-src="' . ut_img_asset_url( 'replace-normal.jpg' ) . '">';

        }

        // image sizes
        if( $orientation == 'portrait' && empty( $sizes ) ) {

            $image_sizes = ut_recognized_portrait_image_sizes( true );

        } elseif( $orientation == 'landscape' && empty( $sizes ) ) {

            $image_sizes = ut_recognized_landscape_image_sizes( true );

        } elseif( $orientation == 'auto' && !empty( $sizes ) ) {

	        $img_meta = wp_get_attachment_metadata( $image_ID );
	        $image_sizes = ut_dynamic_image_sizes( $sizes[0], $sizes[1], $crop, ( $img_meta['width'] > $img_meta['height'] ) ? 'landscape' : 'portrait' );

        } elseif( !empty( $sizes ) ) {

            $image_sizes = ut_dynamic_image_sizes( $sizes[0], $sizes[1], $crop, $orientation );

        }


	    // limit sizes 3 = maxsize
	    if( isset( $image_sizes ) && isset( $sizes[3] ) ) {

		    foreach ( $image_sizes as $width => $height ) {

			    if( $width > $sizes[3] ) {

			        unset( $image_sizes[$width] );

			    }

		    }

	    }

        // arrays for all images
        $data_responsive_images = array();

        foreach ( $image_sizes as $width => $height ) {

            $data_responsive_images[ $width ] = ipq_get_theme_image_url(
	            $image_ID,
                array(
                    $width,
                    $height,
	                $crop,
                    true
                )
            );

            // $data_responsive_images[$width] = ut_resize( $full_size , $width , $height, true , true, true );

        }

        $image_attributes = array();

        // get image alt
	    $image_alt = get_post_meta( $image_ID, '_wp_attachment_image_alt', true );

        // get caption
        $caption = get_post( $image_ID )->post_excerpt;

        // whether to use alt or caption
	    $image_alt = empty( $image_alt ) ? $caption : $image_alt;

        if( !empty( $caption ) ) {

            $image_attributes['alt'] = esc_attr( $image_alt );

        }

        // Image
        $image_size = self::get_generated_image_size( $data_responsive_images[1500] );

        // Fallback
        if( empty( $image_size[0] ) && empty( $image_size[1] ) ) {

	        $image_size = !empty( $sizes ) ? $sizes : array( 1500, 1500 );

        }

        if( $force_load ) {

            $image_attributes['src'] = $data_responsive_images[1500];

        } else {

            $image_attributes['src'] = self::create_responsive_placeholder_svg( $image_size[0], $image_size[1] );

        }

        $image_attributes['width']  = esc_attr( $image_size[0] );
        $image_attributes['height'] = esc_attr( $image_size[1] );

        $image_attributes['data-src']      = esc_url( $data_responsive_images[1500] );
        $image_attributes['data-image-id'] = esc_attr( $image_ID );

        // data attributes string
        $attributes = implode(' ', array_map(
            function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
            $image_attributes,
            array_keys( $image_attributes )
        ) );

        ob_start(); ?>

        <img data-adaptive-images="<?php echo htmlspecialchars( json_encode( $data_responsive_images ), ENT_QUOTES, 'UTF-8' ) ?>" <?php echo $attributes; ?> class="<?php echo implode( " ", array_unique( $classes ) ); ?>">

        <?php

        return ob_get_clean();

    }

}


/**
 * Get Custom Image Sizes
 *
 * @param     $post_type
 * @return    array
 *
 * @access    public
 * @since     4.9.0
 * @version   1.0.0
 */

function ut_get_custom_image_size( $post_type = '' ) {

    $image_size = array();

    if( 'product' == $post_type && ot_get_option( 'ut_single_product_image_size', 'landscape' ) == 'auto' ) {

        if( ot_get_option( 'ut_single_product_image_width' ) && ot_get_option( 'ut_single_product_image_height' ) ) {

            $image_size = array(
                preg_replace('/[^0-9]/', '', ot_get_option( 'ut_single_product_image_width' ) ),
                preg_replace('/[^0-9]/', '', ot_get_option( 'ut_single_product_image_height' ) ),
            );

        }

    }

    return $image_size;

}

/**
 * Check if original file is newer than cached file
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.9.0
 * @version   1.0.0
 */

if( !function_exists( 'ut_compare_file_date' ) ) {

    function ut_compare_file_date( $original_url, $resized_url ) {

        $orignal_file_date = date( "Y-m-d H:i", filemtime( $original_url ) );
        $resized_file_data = date( "Y-m-d H:i", filemtime( $resized_url ) );

        return $resized_file_data < $orignal_file_date;

    }

}

/**
 * add image sizes to image meta for later usage
 *
 * @return    void
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

if( !function_exists( 'ut_add_image_meta' ) ) {

    function ut_add_image_meta( $url, $dst_w, $dst_h, $retina = false ) {

        if( empty( $url ) || empty( $dst_w ) || empty( $dst_h ) ) {
            return;
        }

        global $wpdb;

        $query = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE guid='%s'", esc_url( $url ) );
        $get_attachment = $wpdb->get_results( $query );

        if( isset( $get_attachment[0]->ID ) ) {

            $metadata = wp_get_attachment_metadata( $get_attachment[0]->ID );

            if ( isset( $metadata['image_meta'] ) && !$retina ) {

                $metadata['image_meta']['resized_images'][] = $dst_w .'x'. $dst_h;
                wp_update_attachment_metadata( $get_attachment[0]->ID, $metadata );

            }

            if( isset( $metadata['image_meta'] ) && $retina ) {

                $metadata['image_meta']['resized_images'][] = $dst_w .'x'. $dst_h . '@2x';
                wp_update_attachment_metadata( $get_attachment[0]->ID, $metadata );

            }

        }

    }

}

/**
 * delete dynamic generated images from library
 *
 * @return    void
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

if(!function_exists( 'ut_delete_resized_images' ) ) {

    function ut_delete_resized_images( $post_id ) {

        // Get attachment image metadata
        $metadata = wp_get_attachment_metadata( $post_id );

        /* no meta found, let's leave */
        if ( !$metadata ) {
            return;
        }

        /* meta found but no image meta set */
        if ( !isset( $metadata['file'] ) || !isset( $metadata['image_meta']['resized_images'] ) ) {
            return;
        }


        $pathinfo = pathinfo( $metadata['file'] );
        $resized_images = $metadata['image_meta']['resized_images'];

        /* get Wordpress uploads directory (and bail if it doesn't exist) */
        $wp_upload_dir = wp_upload_dir();
        $upload_dir = $wp_upload_dir['basedir'];

        if ( !is_dir( $upload_dir ) ) {
            return;
        }

        /* Delete the resized images */
        foreach ( $resized_images as $dims ) {

            // Get the resized images filenames
            $file = $upload_dir .'/'. $pathinfo['dirname'] .'/'. $pathinfo['filename'] .'-'. $dims .'.'. $pathinfo['extension'];
            $file_retina = $upload_dir .'/'. $pathinfo['dirname'] .'/'. $pathinfo['filename'] .'-'. $dims .'@2x.'. $pathinfo['extension'];

            // Delete the resized image
            @unlink( $file );
            @unlink( $file_retina );

        }

    }

    add_action( 'delete_attachment', 'ut_delete_resized_images' );

}


if( !class_exists( 'UT_Resize' ) ) {

    class UT_Exception extends Exception {

    }

    class UT_Resize {

        static private $instance = null;

        public $throwOnError = false;

        /**
         * No initialization allowed
         */
        private function __construct() {

        }

        /**
         * No cloning allowed
         */
        private function __clone() {

        }

        /**
         * For your custom default usage you may want to initialize an UT_Resize object by yourself and then have own defaults
         */
        static public function getInstance() {

            if( self::$instance == null ) {
                self::$instance = new self;
            }

            return self::$instance;

        }


        public function process( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false, $retina = true ) {

            try {

                if ( !$url ) {

                    return $url;

                }

                if ( !$width ) {

                    return $url;

                }

                if ( !$height ) {

                    return $url;

                }

                if ( true === $upscale ) {

                    add_filter( 'image_resize_dimensions', array($this, 'ut_upscale'), 10, 6 );

                }

                /* define upload path & dir. */
                $upload_info = wp_upload_dir();
                $upload_dir  = $upload_info['basedir'];
                $upload_url  = $upload_info['baseurl'];

                /* protocoll prefix */
                $http_prefix = "http://";
                $https_prefix = "https://";

                /* if the $url scheme differs from $upload_url scheme, make them match - if the schemes differe, images don't show up. */
                if( !strncmp( $url, $https_prefix, strlen( $https_prefix ) ) ){

                    /* if url begins with https:// make $upload_url begin with https:// as well */
                    $upload_url = str_replace( $http_prefix, $https_prefix, $upload_url );

                }
                elseif(!strncmp( $url, $http_prefix, strlen( $http_prefix ) ) ){

                    /* if url begins with http:// make $upload_url begin with http:// as well */
                    $upload_url = str_replace( $https_prefix, $http_prefix, $upload_url );

                }

                /* Check if $img_url is local. */
                if ( false === strpos( $url, $upload_url ) ) {

                    return $url;

                }


                /* define path of image. */
                $rel_path = str_replace( $upload_url, '', $url );
                $img_path = $upload_dir . $rel_path;

                /* check if img path exists, and is an image indeed. */
                if ( ! file_exists( $img_path ) or ! getimagesize( $img_path ) ) {

                    return $url;

                }


                // Get image info.
                $info = pathinfo( $img_path );
                $ext = $info['extension'];
                list( $orig_w, $orig_h ) = getimagesize( $img_path );

                // Get image size after cropping.
                $dims = image_resize_dimensions( $orig_w, $orig_h, $width, $height, $crop );

                if( is_array( $dims ) ) {

                    $dst_w = $dims[4];
                    $dst_h = $dims[5];

                } else {

                    return $url;

                }

                // Return the original image only if it exactly fits the needed measures.
                if ( ! $dims || ( ( ( null === $height && $orig_w == $width ) xor ( null === $width && $orig_h == $height ) ) xor ( $height == $orig_h && $width == $orig_w ) ) ) {

                    $img_url = $url;
                    $dst_w = $orig_w;

                    $dst_h = $orig_h;

                } else {

                    // Use this to check if cropped image already exists, so we can return that instead.
                    $suffix = "{$dst_w}x{$dst_h}";
                    $dst_rel_path = str_replace( '.' . $ext, '', $rel_path );
                    $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

                    if ( ! $dims || ( true == $crop && false == $upscale && ( $dst_w < $width || $dst_h < $height ) ) ) {

                        return $url;

                    }

                    // Else check if cache exists.
                    elseif ( file_exists( $destfilename ) && getimagesize( $destfilename ) && !ut_compare_file_date( $img_path, $destfilename ) ) {

                        $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";

                    }
                    // Else, we resize the image and return the new resized image url.
                    else {

                        $editor = wp_get_image_editor( $img_path );

                        if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) ) {

                            return $url;

                        }

                        $editor->set_quality( 90 );
                        $resized_file = $editor->save();

                        if ( ! is_wp_error( $resized_file ) ) {

                            $resized_rel_path = str_replace( $upload_dir, '', $resized_file['path'] );
                            $img_url = $upload_url . $resized_rel_path;

                            /* save image dimensions */
                            ut_add_image_meta( $url, $dst_w, $dst_h, false );

                        } else {

                            return $url;

                        }

                    }
                }

                // Return the output.
                if ( $single ) {

                    // str return.
                    $image = $img_url;

                } else {

                    // array return.
                    $image = array (
                        0 => $img_url,
                        1 => $dst_w,
                        2 => $dst_h
                    );

                }

                if( $retina ) {

                    $retina_w = $dst_w*2;
                    $retina_h = $dst_h*2;

                    //get image size after cropping
                    $dims_x2  = image_resize_dimensions($orig_w, $orig_h, $retina_w, $retina_h, $crop);

	                if( $dims_x2 ) {

		                $dst_x2_w = $dims_x2[4];
		                $dst_x2_h = $dims_x2[5];

		                // If possible lets make the @2x image
		                if ( $dst_x2_h && isset( $dst_rel_path ) && isset( $suffix ) ) {

			                $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}@2x.{$ext}";

			                /* check if retina image exists */
			                if ( file_exists( $destfilename ) && getimagesize( $destfilename ) && ! ut_compare_file_date( $img_path, $destfilename ) ) {

				                /* already exists, do nothing */

			                } else {

				                /* doesnt exist, lets create it */
				                $editor = wp_get_image_editor( $img_path );

				                if ( ! is_wp_error( $editor ) ) {

					                $editor->resize( $retina_w, $retina_h, $crop );
					                $editor->set_quality( 100 );
					                $filename = $editor->generate_filename( $dst_w . 'x' . $dst_h . '@2x' );
					                $editor   = $editor->save( $filename );

					                /* save image dimensions */
					                ut_add_image_meta( $url, $dst_w, $dst_h, true );

				                } else {

					                throw new UT_Exception( 'Unable to save resized image file: ' . $editor->get_error_message() );

				                }

			                }

		                }

	                }

                }

                // Okay, leave the ship.
                if ( true === $upscale ) {

                    remove_filter( 'image_resize_dimensions', array( $this, 'ut_upscale' ) ) ;

                }

                return $image;

            }

            catch ( UT_Exception $ex ) {

                error_log('UT_Resize.process() error: ' . $ex->getMessage() );

                if ($this->throwOnError) {

                    throw $ex;

                } else {

                    return false;

                }

            }

        }

        /**
         * Callback to overwrite WP computing of thumbnail measures
         */
        function ut_upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {

            if ( ! $crop ) return null; // Let the wordpress default function handle this.

            // Here is the point we allow to use larger image size than the original one.
            $aspect_ratio = $orig_w / $orig_h;
            $new_w = $dest_w;
            $new_h = $dest_h;

            if ( ! $new_w ) {
                $new_w = intval( $new_h * $aspect_ratio );
            }

            if ( ! $new_h ) {
                $new_h = intval( $new_w / $aspect_ratio );
            }

            $size_ratio = max( $new_w / $orig_w, $new_h / $orig_h );

            $crop_w = round( $new_w / $size_ratio );
            $crop_h = round( $new_h / $size_ratio );

            $s_x = floor( ( $orig_w - $crop_w ) / 2 );
            $s_y = floor( ( $orig_h - $crop_h ) / 2 );

            return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

        }

    }

}


if( !function_exists('ut_resize') ) {

    function ut_resize( $url, $width = null, $height = null, $crop = null, $single = true, $upscale = false ) {

        if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {

            $args = array(
                'resize' => "$width,$height"
            );

            return jetpack_photon_url( $url, $args );

        } else {

            if ( defined( 'ICL_SITEPRESS_VERSION' ) ){
                global $sitepress;
                $url = $sitepress->convert_url( $url, $sitepress->get_default_language() );
            }

            $ut_resize = UT_Resize::getInstance();
            return $ut_resize->process( $url, $width, $height, $crop, $single, $upscale );

        }

    }

}