<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// load image processing core
require_once( THEME_DOCUMENT_ROOT . '/inc/image-processing/vendor/autoload.php' );

Image_Processing_Queue\Queue::instance();

$attempts = apply_filters( 'ipq_job_attempts', 3 );
$interval = apply_filters( 'ipq_cron_interval', 1 );

wp_queue()->cron( $attempts, $interval );


/*
 * Create Tables for Cron Jobs
 */

function ut_create_image_processing_tables() {

	$version = get_site_option( 'ipq_version', '0.0.0' );

	if ( version_compare( $version, '1.0.0', '<' ) ) {

	    wp_queue_install_tables();
		update_site_option( 'ipq_version', '1.0.0' );

	}

}

add_action( 'admin_init', 'ut_create_image_processing_tables' );



/**
 * Admin Interface to see all currently processing images
 * allows unlocking of images
 */

class UT_Image_Crontrol {

    protected $processing_errors = array();

	protected function __construct() {

		add_action( 'admin_menu', array( $this, 'action_handle_posts' ) );
		add_action( 'admin_menu', array( $this, 'action_admin_menu' ) );

	}

	/**
	 * Adds management pages to the admin menu.
	 *
	 * Run using the 'admin_menu' action.
	 */
	public function action_admin_menu() {

		add_management_page(
			esc_html__( 'Image Processing', 'unitedthemes' ),
			esc_html__( 'Image Processing', 'unitedthemes' ),
			'manage_options',
			'image_crontrol_admin_manage_page',
			array( $this, 'admin_manage_page' )
		);

	}


	/**
	 * Query Process Failures
     *
     * @return mixed
	 */

	public function query_errors() {

		global $wpdb;

		$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}queue_failures", OBJECT );

		if( $results ) {

		    $this->processing_errors = $results;

        } else {

			$this->processing_errors = '';

        }

    }


	/**
	 * Display Process Failures
	 *
     * @param $image_ID
     * @param $locked_date
     *
     * @throws
     *
	 * @return string
	 */

	public function display_process_errors( $image_ID, $locked_date ) {

		if( !empty( $this->processing_errors ) ) {

		    $error_found = false;

			foreach( $this->processing_errors as $processing_error ) {

		        $job = maybe_unserialize( $processing_error->job );

				if( $job->image['post_id'] == $image_ID && new DateTime( $processing_error->failed_at ) > new DateTime( $locked_date ) ) {

                    $image_url = wp_get_attachment_url( $image_ID );

                    $FastImageSize  = new \FastImageSize\FastImageSize();
                    $FastImageSizes = $FastImageSize->getImageSize( $image_url );

                    if( $job->image['width'] > $FastImageSizes['width'] && $job->image['height'] > $FastImageSizes['height'] ) {

                        // is softcrop with upscale
                        if( !$job->image['crop'] && $job->image['upscale'] ) {

	                        $image = '';

                            if( $image_ID == 943 || $image_ID == 444 ) {
	                            // $image = ut_resize( wp_get_attachment_url( $image_ID ), $job->image['width'], $job->image['height'], true, true, true );
                            }

                        }

                    }






					return sprintf(
					        esc_html__( '%s. Used Settings: (%s)x(%s) softcrop: (%s) upscale (%s) failed. Please change the Settings (and then unlock the image) or Upload an alternate Image with dimensions meeting the requirements.', 'unitedthemes' ),
                            $processing_error->error,
                            $job->image['width'],
                            $job->image['height'],
                            ( $job->image['crop'] ) ? 'off' : 'on',
						    ( $job->image['upscale'] ) ? 'on' : 'off'
                    );

                }

			}

			if( !$error_found ) {

				return esc_html__( 'Processing', 'unitedthemes' );

            }

		} else {

            return esc_html__( 'Processing', 'unitedthemes' );

        }

    }

	/**
	 * Make Lock Status Readable
     *
     * @param string $locked_size
     * @return string
     *
	 */

    public function generate_size_name( $locked_size = '' ) {

	    $locked_size = explode('_', $locked_size );
	    return sprintf( "%sx%s - crop:%s - upscale:%s", $locked_size[0], $locked_size[1], ( $locked_size[2] == 1 ? 'on' : 'off' ), ( $locked_size[3] == 1 ? 'on' : 'off' ) );

    }

	/**
	 * Make Lock Status Readable
	 *
	 * @param array $locked_status
	 * @return string
	 *
	 */

    public function generate_size_box( $locked_status = array() ) {

	    return implode("<br>", array_map(
		    function( $v, $k ) { return sprintf("%s", $this->generate_size_name( $v )); },
		    $locked_status,
		    array_keys( $locked_status )
	    ) );

    }


	/**
	 * Displays the manage page.
	 */

	public function admin_manage_page() {

	    if( isset( $_GET['process_worker'] ) ) {

            $attempts = apply_filters( 'ipq_job_attempts', 3 );
	        wp_queue()->worker($attempts)->process();

        }

		$query_images_args = array(
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'post_status'    => 'inherit',
			'posts_per_page' => - 1,
		);

		$query_images = new WP_Query( $query_images_args );

		$images = array();

		foreach ( $query_images->posts as $image ) {

			$image_meta = wp_get_attachment_metadata( $image->ID );

			if ( isset( $image_meta['ipq_locked'] ) && $image_meta['ipq_locked'] ) {

				$images[$image->ID] = wp_prepare_attachment_for_js( $image->ID );
				$images[$image->ID]['ipq_locked'] = $image_meta['ipq_locked'];

				if ( isset( $image_meta['ipq_locked_time'] ) && $image_meta['ipq_locked_time'] ) {

					$images[$image->ID]['ipq_locked_time'] = $image_meta['ipq_locked_time'];

				} else {

					$images[$image->ID]['ipq_locked_time'] = '';

				}


			}

		}

		$this->query_errors(); ?>

		<div class="wrap">
			<h1><?php esc_html_e( 'Currently Processing Images', 'unitedthemes' ); ?></h1><br>
			<form method="post" action="tools.php?page=image_crontrol_admin_manage_page">
				<table class="widefat striped">
				<thead>
				<tr>
					<td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1"><?php esc_html_e( 'Select All', 'unitedthemes' ); ?></label><input id="cb-select-all-1" type="checkbox"></td>
					<th scope="col"><?php esc_html_e( 'Image ID', 'unitedthemes' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Preview', 'unitedthemes' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Image Title', 'unitedthemes' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Locked Timestamp', 'unitedthemes' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Sizes in Queue', 'unitedthemes' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Locked', 'unitedthemes' ); ?></th>
                    <th scope="col"><?php esc_html_e( 'Process Status', 'unitedthemes' ); ?></th>
				</tr>
				</thead>
				<tbody>

					<?php foreach ( $images as $id => $image ) {

						echo '<tr>';

							// checkbox to remove locked status
							echo '<th scope="row" class="check-column">';

							printf(
								'<input type="checkbox" name="delete[%1$s]" value="%2$s">',
								esc_attr( $image['id'] ),
								esc_attr( $image['id'] )
							);

							echo '</th>';

							// image id
							echo '<td><em>' . ucwords( $image['id'] ) . '</em></td>';

							// image preview
							$thumbnail = wp_get_attachment_image_src( (int)$image['id'], 'ut-mini' );

							echo '<td><em><img width="50" height="50" src="' . $thumbnail[0] . '" /></em></td>';

							// image title
							echo '<td><em>' . ucwords( $image['title'] ) . '</em></td>';

							// image locked timestamp
							echo '<td><em>' . ucwords( $image['ipq_locked_time'] ) . '</em></td>';

							// image sizes
						    echo '<td><em>' . $this->generate_size_box( $image['ipq_locked'] ) . '</em></td>';

							// link to remove individually
							echo '<td><em>';

							$link = array(
								'page'     => 'image_crontrol_admin_manage_page',
								'action'   => 'delete-locked',
								'id'       => rawurlencode( $image['id'] )
							);
							$link = add_query_arg( $link, admin_url( 'tools.php' ) );
							$link = wp_nonce_url( $link, "delete-locked_{$image['id']}" );

							echo "<span class='delete'><a href='" . esc_url( $link ) . "'>" . esc_html__( 'Unlock Image', 'unitedthemes' ) . '</a></span>';

							echo '</em></td>';

							// possible error
						    echo '<td><em>';

                                echo $this->display_process_errors( $image['id'], $image['ipq_locked_time'] );

						    echo '</em></td>';

						echo '</tr>';

					} ?>

				</tbody>
				</table>

				<?php

					wp_nonce_field( 'bulk-remove-locked' );
					submit_button(
						__( 'Remove Locked Status', 'unitedthemes' ),
						'primary large',
						'delete_locked'
					);

				?>

			</form>

		</div>

		<?php

	}


	/**
	 * Handles any POSTs made by the admin page. Run using the 'init' action.
	 */

	public function action_handle_posts() {

	    if( isset( $_GET['page'] ) && $_GET['page'] == 'image_crontrol_admin_manage_page' ) {

		    if ( ! current_user_can( 'manage_options' ) ) {
			    wp_die( esc_html__( 'You are not allowed to delete lock status from images.', 'unitedthemes' ) );
		    }

		    if ( isset( $_POST['delete'] ) ) {

			    check_admin_referer( 'bulk-remove-locked' );

			    $delete = wp_unslash( $_POST['delete'] );

			    foreach ( $delete as $id => $image_ID ) {

				    // get current image meta
				    $image_meta = wp_get_attachment_metadata( $image_ID );

				    // remove locked status
				    unset( $image_meta['ipq_locked'] );
				    unset( $image_meta['ipq_locked_time'] );

				    // update image meta
				    wp_update_attachment_metadata( $image_ID, $image_meta );

			    }

			    $redirect = array(
				    'page' => 'image_crontrol_admin_manage_page'
			    );

			    wp_safe_redirect( add_query_arg( $redirect, admin_url( 'tools.php' ) ) );
			    exit;

		    } else {

			    if ( ! isset( $_GET['id'] ) ) {
				    return;
			    }

			    // image to delete
			    $id = wp_unslash( $_GET['id'] );

			    // check admin refer
			    check_admin_referer( "delete-locked_{$id}" );

			    // get current image meta
			    $image_meta = wp_get_attachment_metadata( $id );

			    // remove locked status
			    unset( $image_meta['ipq_locked'] );

			    // update image meta
			    wp_update_attachment_metadata( $id, $image_meta );

			    $redirect = array(
				    'page' => 'image_crontrol_admin_manage_page'
			    );

			    wp_safe_redirect( add_query_arg( $redirect, admin_url( 'tools.php' ) ) );
			    exit;

		    }

	    }

	}

	public static function init() {

		static $instance = null;

		if ( ! $instance ) {
			$instance = new UT_Image_Crontrol;
		}

		return $instance;

	}

}

// Get this show on the road
UT_Image_Crontrol::init();