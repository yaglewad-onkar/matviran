<?php

namespace Image_Processing_Queue;

use WP_Queue\Job;
use Exception;

class Resize_Job extends Job {

    /**
     * @var array
     */
    public $image;

	/**
	 * Image_Processing_Job constructor.
	 */
	public function __construct( $image ) {
        $this->image = $image;
	}

	/**
	 * Callback to overwrite WP computing of thumbnail measures
	 */

	function upscale( $default, $orig_w, $orig_h, $dest_w, $dest_h, $crop ) {

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


	/**
	 * Handle job logic.
	 *
	 * @throws Exception
	 */

	public function handle() {

		$item = wp_parse_args( $this->image, array(
            'post_id' => 0,
            'width'   => 0,
            'height'  => 0,
            'crop'    => false,
	        'upscale' => true
        ) );

        $post_id = $item['post_id'];
        $width   = $item['width'];
        $height  = $item['height'];
        $crop    = $item['crop'];
		$upscale = $item['upscale'];

        if ( ! $width && ! $height ) {
            throw new Exception( "Invalid dimensions '{$width}x{$height}'" );
        }

        if ( Queue::does_size_already_exist_for_image( $post_id, array( $width, $height, $crop, $upscale ) ) ) {

        	return false;

        }

        $image_meta = Queue::get_image_meta( $post_id );

        if ( ! $image_meta ) {
            return false;
        }

        add_filter( 'as3cf_get_attached_file_copy_back_to_local', '__return_true' );
        $img_path = Queue::get_image_path( $post_id );

        if ( ! $img_path ) {
            return false;
        }

		if ( true === $upscale ) {

			add_filter( 'image_resize_dimensions', array($this, 'upscale' ), 10, 6 );

		}

        $editor = wp_get_image_editor( $img_path );

        if ( is_wp_error( $editor ) ) {

        	throw new Exception( 'Unable to get WP_Image_Editor for file "' . $img_path . '": ' . $editor->get_error_message() . ' (is GD or ImageMagick installed?)' );

        }

        $resize = $editor->resize( $width, $height, $crop );

        if ( is_wp_error( $resize ) ) {

        	// if image is smaller than required size with softcrop and upscale resize will fail - retry with hardcrop
	        $original_size = $editor->get_size();

	        if( $width > $original_size['width'] && $height > $original_size['height'] && !$crop && $upscale ) {

		        $resize = $editor->resize( $width, $height, true );

		        if ( is_wp_error( $resize ) ) {

			        throw new Exception( 'Error resizing image: ' . $resize->get_error_message() );

		        }

			} else {

		        throw new Exception( 'Error resizing image: ' . $resize->get_error_message() );

	        }

        }

        $resized_file = $editor->save();

        if ( is_wp_error( $resized_file ) ) {

			throw new Exception( 'Unable to save resized image file. Check Folder or File Permissions.' );

        }

		if ( true === $upscale ) {

			remove_filter( 'image_resize_dimensions', array( $this, 'upscale' ) ) ;

		}

        $size_name = Queue::get_size_name( array( $width, $height, $crop, $upscale ) );
        $image_meta['sizes'][ $size_name ] = array(
            'file'      => $resized_file['file'],
            'width'     => $resized_file['width'],
            'height'    => $resized_file['height'],
            'mime-type' => $resized_file['mime-type'],
        );

        if( empty( $image_meta['ipq_locked'] ) || is_bool( $image_meta['ipq_locked'] ) ) {

			$image_meta['ipq_locked'] = array();

		}

        $image_meta['ipq_locked'] = array_diff( $image_meta['ipq_locked'], array( Queue::lock_string( array( $width, $height, $crop, $upscale ) ) ) );
        wp_update_attachment_metadata( $post_id, $image_meta );

	}

}