<?php

/**
 * This class handles downloading a remote image file and inserting it
 * into the WP Media Library.
 *
 * Usage:
 * $download_remote_image = new Unite_Download_Remote_File( $url );
 * $attachment_id         = $download_remote_image->download();
 *
 */

class Unite_Download_Remote_File {

	/**
	 * Remote image URL.
	 *
	 * @var string
	 */
	private $url = '';

	/**
	 * The attachment data, in this format:
	 *
	 * array(
	 *    $title       = '',
	 *    $caption     = '',
	 *    $alt_text    = '',
	 *    $description = '',
	 * );
	 *
	 * @var array
	 */
	private $attachment_data = array();

	/**
	 * The attachment ID or false if none.
	 *
	 * @var int|bool
	 */
	private $attachment_id = false;

	/**
	 * Optional File Name
	 *
	 * @var int|bool
	 */
	private $file_name = '';

	/**
	 * Constructor.
	 *
	 * @param string $url             The URL for the remote image.
	 *
	 * @param array $attachment_data {
	 *     Optional. Data to be used for the attachment.
	 *
	 *     @type string $title       The title. Also used to create the filename.
	 *     @type string $caption     The caption.
	 *     @type string $alt_text    The alt text.
	 *     @type string $description The description.
	 * }
	 */
	public function __construct( $url, $attachment_data = array(), $filename = '' ) {

		$this->url = $this->format_url( $url );

		if ( is_array( $attachment_data ) && $attachment_data ) {
			$this->attachment_data = array_map( 'sanitize_text_field', $attachment_data );
		}

		if( !empty( $filename ) ) {
			$this->file_name = $filename;
		}

	}

    /**
     * Detect File Type
     *
     * @param  $filename
     * @param  $fallback_mime
     * @param  $debug
     *
     * @return mixed
     */

    public function get_file_mime_type( $filename, $fallback_mime = 'class',  $debug = false ) {

        if ( function_exists( 'mime_content_type' ) ) {

            $mime_type = mime_content_type( $filename );

            if ( ! empty( $mime_type ) ) {

                if ( true === $debug ) {
                    return array('mime_type' => $mime_type, 'method' => 'mime_content_type');
                }

                return $mime_type;

            }

        }

	    if ( function_exists( 'finfo_open' ) && function_exists( 'finfo_file' ) && function_exists( 'finfo_close' ) ) {

	        $fileinfo  = finfo_open( FILEINFO_MIME );
            $mime_type = finfo_file( $fileinfo, $filename );

            finfo_close( $fileinfo );

            if ( ! empty( $mime_type ) ) {

                if ( true === $debug ) {
                    return array('mime_type' => $mime_type, 'method' => 'fileinfo');
                }

                return $mime_type;

            }

        }

        $mime_types = array(
            'ai'      => 'application/postscript',
            'aif'     => 'audio/x-aiff',
            'aifc'    => 'audio/x-aiff',
            'aiff'    => 'audio/x-aiff',
            'asc'     => 'text/plain',
            'asf'     => 'video/x-ms-asf',
            'asx'     => 'video/x-ms-asf',
            'au'      => 'audio/basic',
            'avi'     => 'video/x-msvideo',
            'bcpio'   => 'application/x-bcpio',
            'bin'     => 'application/octet-stream',
            'bmp'     => 'image/bmp',
            'bz2'     => 'application/x-bzip2',
            'cdf'     => 'application/x-netcdf',
            'chrt'    => 'application/x-kchart',
            'class'   => 'application/octet-stream',
            'cpio'    => 'application/x-cpio',
            'cpt'     => 'application/mac-compactpro',
            'csh'     => 'application/x-csh',
            'css'     => 'text/css',
            'dcr'     => 'application/x-director',
            'dir'     => 'application/x-director',
            'djv'     => 'image/vnd.djvu',
            'djvu'    => 'image/vnd.djvu',
            'dll'     => 'application/octet-stream',
            'dms'     => 'application/octet-stream',
            'doc'     => 'application/msword',
            'dvi'     => 'application/x-dvi',
            'dxr'     => 'application/x-director',
            'eps'     => 'application/postscript',
            'etx'     => 'text/x-setext',
            'exe'     => 'application/octet-stream',
            'ez'      => 'application/andrew-inset',
            'flv'     => 'video/x-flv',
            'gif'     => 'image/gif',
            'gtar'    => 'application/x-gtar',
            'gz'      => 'application/x-gzip',
            'hdf'     => 'application/x-hdf',
            'hqx'     => 'application/mac-binhex40',
            'htm'     => 'text/html',
            'html'    => 'text/html',
            'ice'     => 'x-conference/x-cooltalk',
            'ief'     => 'image/ief',
            'iges'    => 'model/iges',
            'igs'     => 'model/iges',
            'img'     => 'application/octet-stream',
            'iso'     => 'application/octet-stream',
            'jad'     => 'text/vnd.sun.j2me.app-descriptor',
            'jar'     => 'application/x-java-archive',
            'jnlp'    => 'application/x-java-jnlp-file',
            'jpe'     => 'image/jpeg',
            'jpeg'    => 'image/jpeg',
            'jpg'     => 'image/jpeg',
            'js'      => 'application/x-javascript',
            'kar'     => 'audio/midi',
            'kil'     => 'application/x-killustrator',
            'kpr'     => 'application/x-kpresenter',
            'kpt'     => 'application/x-kpresenter',
            'ksp'     => 'application/x-kspread',
            'kwd'     => 'application/x-kword',
            'kwt'     => 'application/x-kword',
            'latex'   => 'application/x-latex',
            'lha'     => 'application/octet-stream',
            'lzh'     => 'application/octet-stream',
            'm3u'     => 'audio/x-mpegurl',
            'man'     => 'application/x-troff-man',
            'me'      => 'application/x-troff-me',
            'mesh'    => 'model/mesh',
            'mid'     => 'audio/midi',
            'midi'    => 'audio/midi',
            'mif'     => 'application/vnd.mif',
            'mov'     => 'video/quicktime',
            'movie'   => 'video/x-sgi-movie',
            'mp2'     => 'audio/mpeg',
            'mp3'     => 'audio/mpeg',
            'mpe'     => 'video/mpeg',
            'mpeg'    => 'video/mpeg',
            'mpg'     => 'video/mpeg',
            'mpga'    => 'audio/mpeg',
            'ms'      => 'application/x-troff-ms',
            'msh'     => 'model/mesh',
            'mxu'     => 'video/vnd.mpegurl',
            'nc'      => 'application/x-netcdf',
            'odb'     => 'application/vnd.oasis.opendocument.database',
            'odc'     => 'application/vnd.oasis.opendocument.chart',
            'odf'     => 'application/vnd.oasis.opendocument.formula',
            'odg'     => 'application/vnd.oasis.opendocument.graphics',
            'odi'     => 'application/vnd.oasis.opendocument.image',
            'odm'     => 'application/vnd.oasis.opendocument.text-master',
            'odp'     => 'application/vnd.oasis.opendocument.presentation',
            'ods'     => 'application/vnd.oasis.opendocument.spreadsheet',
            'odt'     => 'application/vnd.oasis.opendocument.text',
            'ogg'     => 'application/ogg',
            'otg'     => 'application/vnd.oasis.opendocument.graphics-template',
            'oth'     => 'application/vnd.oasis.opendocument.text-web',
            'otp'     => 'application/vnd.oasis.opendocument.presentation-template',
            'ots'     => 'application/vnd.oasis.opendocument.spreadsheet-template',
            'ott'     => 'application/vnd.oasis.opendocument.text-template',
            'pbm'     => 'image/x-portable-bitmap',
            'pdb'     => 'chemical/x-pdb',
            'pdf'     => 'application/pdf',
            'pgm'     => 'image/x-portable-graymap',
            'pgn'     => 'application/x-chess-pgn',
            'png'     => 'image/png',
            'pnm'     => 'image/x-portable-anymap',
            'ppm'     => 'image/x-portable-pixmap',
            'ppt'     => 'application/vnd.ms-powerpoint',
            'ps'      => 'application/postscript',
            'qt'      => 'video/quicktime',
            'ra'      => 'audio/x-realaudio',
            'ram'     => 'audio/x-pn-realaudio',
            'ras'     => 'image/x-cmu-raster',
            'rgb'     => 'image/x-rgb',
            'rm'      => 'audio/x-pn-realaudio',
            'roff'    => 'application/x-troff',
            'rpm'     => 'application/x-rpm',
            'rtf'     => 'text/rtf',
            'rtx'     => 'text/richtext',
            'sgm'     => 'text/sgml',
            'sgml'    => 'text/sgml',
            'sh'      => 'application/x-sh',
            'shar'    => 'application/x-shar',
            'silo'    => 'model/mesh',
            'sis'     => 'application/vnd.symbian.install',
            'sit'     => 'application/x-stuffit',
            'skd'     => 'application/x-koan',
            'skm'     => 'application/x-koan',
            'skp'     => 'application/x-koan',
            'skt'     => 'application/x-koan',
            'smi'     => 'application/smil',
            'smil'    => 'application/smil',
            'snd'     => 'audio/basic',
            'so'      => 'application/octet-stream',
            'spl'     => 'application/x-futuresplash',
            'src'     => 'application/x-wais-source',
            'stc'     => 'application/vnd.sun.xml.calc.template',
            'std'     => 'application/vnd.sun.xml.draw.template',
            'sti'     => 'application/vnd.sun.xml.impress.template',
            'stw'     => 'application/vnd.sun.xml.writer.template',
            'sv4cpio' => 'application/x-sv4cpio',
            'sv4crc'  => 'application/x-sv4crc',
            'swf'     => 'application/x-shockwave-flash',
            'sxc'     => 'application/vnd.sun.xml.calc',
            'sxd'     => 'application/vnd.sun.xml.draw',
            'sxg'     => 'application/vnd.sun.xml.writer.global',
            'sxi'     => 'application/vnd.sun.xml.impress',
            'sxm'     => 'application/vnd.sun.xml.math',
            'sxw'     => 'application/vnd.sun.xml.writer',
            't'       => 'application/x-troff',
            'tar'     => 'application/x-tar',
            'tcl'     => 'application/x-tcl',
            'tex'     => 'application/x-tex',
            'texi'    => 'application/x-texinfo',
            'texinfo' => 'application/x-texinfo',
            'tgz'     => 'application/x-gzip',
            'tif'     => 'image/tiff',
            'tiff'    => 'image/tiff',
            'torrent' => 'application/x-bittorrent',
            'tr'      => 'application/x-troff',
            'tsv'     => 'text/tab-separated-values',
            'txt'     => 'text/plain',
            'ustar'   => 'application/x-ustar',
            'vcd'     => 'application/x-cdlink',
            'vrml'    => 'model/vrml',
            'wav'     => 'audio/x-wav',
            'wax'     => 'audio/x-ms-wax',
            'wbmp'    => 'image/vnd.wap.wbmp',
            'wbxml'   => 'application/vnd.wap.wbxml',
            'wm'      => 'video/x-ms-wm',
            'wma'     => 'audio/x-ms-wma',
            'wml'     => 'text/vnd.wap.wml',
            'wmlc'    => 'application/vnd.wap.wmlc',
            'wmls'    => 'text/vnd.wap.wmlscript',
            'wmlsc'   => 'application/vnd.wap.wmlscriptc',
            'wmv'     => 'video/x-ms-wmv',
            'wmx'     => 'video/x-ms-wmx',
            'wrl'     => 'model/vrml',
            'wvx'     => 'video/x-ms-wvx',
            'xbm'     => 'image/x-xbitmap',
            'xht'     => 'application/xhtml+xml',
            'xhtml'   => 'application/xhtml+xml',
            'xls'     => 'application/vnd.ms-excel',
            'xml'     => 'text/xml',
            'xpm'     => 'image/x-xpixmap',
            'xsl'     => 'text/xml',
            'xwd'     => 'image/x-xwindowdump',
            'xyz'     => 'chemical/x-xyz',
            'zip'     => 'application/zip'
        );

        $ext = strtolower( array_pop( explode( '.', $filename ) ) );

        if ( ! empty( $mime_types[$ext] ) ) {

            if ( true === $debug ) {
                return array('mime_type' => $mime_types[$ext], 'method' => 'from_array');
            }

            return $mime_types[$ext];

        }

        if ( true === $debug ) {
            return array('mime_type' => 'application/octet-stream', 'method' => 'last_resort');
        }

        return $mime_types[$fallback_mime];

    }

	/**
	 * Add a scheme, if missing, to a URL.
	 *
	 * Warning: This method defaults to using 'http' when adding a scheme to
	 * protocol-relative URLs and would need to be modified for remote images
	 * only available at 'https' URLs.
	 *
	 * @param  string $url The URL.
	 *
	 * @return string The URL, with a scheme possibly prepended.
	 */
	private function format_url( $url ) {

		if ( $this->has_valid_scheme( $url ) ) {
			return $url;
		}

		if ( $this->does_string_start_with_substring( $url, '//' ) ) {
			return "https:{$url}";
		}

		return "https://{$url}";
	}

	/**
	 * Does this URL have a valid scheme?
	 *
	 * @param  string $url The URL.
	 *
	 * @return bool
	 */
	private function has_valid_scheme( $url ) {

		return $this->does_string_start_with_substring( $url, 'https://' ) || $this->does_string_start_with_substring( $url, 'http://' );

	}

	/**
	 * Does this string start with this substring?
	 *
	 * @param string $string    The string.
	 * @param string $substring The substring.
	 *
	 * @return bool
	 */

	private function does_string_start_with_substring( $string, $substring ) {

		return 0 === strpos( $string, $substring );

	}

	/**
	 * Download a remote image and insert it into the WordPress Media Library as an attachment.
	 *
     * @param string $mime optional mime for exotic servers
     *
	 * @return bool|int The attachment ID, or false on failure.
	 */
	public function download( $mime = '' ) {

		if ( ! $this->is_url_valid() ) {
			return false;
		}

		// Download remote file and sideload it into the uploads directory.
		$file_attributes = $this->sideload( $mime );

		if ( ! $file_attributes ) {
			return false;
		}

		// Insert the image as a new attachment.
		$this->insert_attachment( $file_attributes['file'], $file_attributes['type'] );

		if ( ! $this->attachment_id ) {
			return false;
		}

		$this->update_metadata();
		$this->update_post_data();
		$this->update_alt_text();

		return $this->attachment_id;

	}

	/**
	 * Is this URL valid?
	 *
	 * @return bool
	 */
	private function is_url_valid() {

		$parsed_url = wp_parse_url( $this->url );

		return $this->has_valid_scheme( $this->url ) && $parsed_url && isset( $parsed_url['host'] );

	}

	/**
	 * Sideload the remote image into the uploads directory.
	 *
     * @param string $mime optional mime for exotic servers
     *
	 * @return array|bool Associative array of file attributes, or false on failure.
	 */
	private function sideload( $mime = '' ) {

		// Gives us access to the download_url() and wp_handle_sideload() functions.
		require_once ABSPATH . 'wp-admin/includes/file.php';

		// Download file to temp dir.
		$temp_file = download_url( $this->url, 10 );

		if ( is_wp_error( $temp_file ) ) {
			return false;
		}

		$mime_type = $this->get_file_mime_type( $temp_file, $mime );

		// some server return application/octet-stream
        if( $mime_type == 'application/octet-stream' ) {

            $manual_meme = array(
                'zip'     => 'application/zip',
                'txt'     => 'text/plain',
                'xml'     => 'text/xml',
            );

            $mime_type = $manual_meme[$mime];

        }

		if ( ! $this->is_supported_file_type( $mime_type ) ) {
			return false;
		}

		// An array similar to that of a PHP `$_FILES` POST array
		$file = array(
			'name'     => $this->get_filename( $mime_type ),
			'type'     => $mime_type,
			'tmp_name' => $temp_file,
			'error'    => 0,
			'size'     => filesize( $temp_file ),
		);

		$overrides = array(
			'test_form'   => false,
			'test_size'   => true,
			'test_upload' => true
		);

		// XML Files
		if( $mime_type == 'text/xml' ) {

			$overrides['mimes'] = array(
				'xml' => 'text/xml',
			);

		}

		// TXT Files
		if( $mime_type == 'text/plain' ) {

			$overrides['mimes'] = array(
				'txt' => 'text/plain',
			);

		}

		// ZIP Files
		if( $mime_type == 'application/zip' ) {

			$overrides['mimes'] = array(
				'zip' => 'application/zip',
			);

		}

		// Overwrite Filename if set explicit
		if( !empty( $this->file_name ) ) {
			$file['name'] = $this->file_name;
		}

		// Move the temporary file into the uploads directory.
		$file_attributes = wp_handle_sideload( $file, $overrides );

		if ( $this->did_a_sideloading_error_occur( $file_attributes ) ) {
			return false;
		}

		return $file_attributes;

	}

	/**
	 * Is this file MIME type supported by the WordPress Media Libarary?
	 *
	 * @param  string $mime_type The MIME type.
	 *
	 * @return bool
	 */
	private function is_supported_file_type( $mime_type ) {

		return in_array( $mime_type, array( 'image/jpeg', 'image/gif', 'image/png', 'image/x-icon', 'text/xml', 'text/plain', 'application/zip', 'application/xml', 'application/json' ), true );

	}

	/**
	 * Get filename for attachment, including extension.
	 *
	 * @param  string $mime_type The MIME type.
	 *
	 * @return string            The filename.
	 */
	private function get_filename( $mime_type ) {

		if ( empty( $this->attachment_data['title'] ) ) {
			return basename( $this->url );
		}

		$filename  = sanitize_title_with_dashes( $this->attachment_data['title'] );
		$extension = $this->get_extension_from_mime_type( $mime_type );

		return $filename . $extension;

	}

	/**
	 * Get a file extension, including the preceding '.' from a file's MIME type.
	 *
	 * @param  string $mime_type The MIME type.
	 *
	 * @return string            The file extension or empty string if not found.
	 */

	private function get_extension_from_mime_type( $mime_type ) {

		$extensions = array(
			'image/jpeg'      => '.jpg',
			'image/gif'       => '.gif',
			'image/png'       => '.png',
			'image/x-icon'    => '.ico',
			'text/xml'        => '.xml',
			'application/zip' => '.zip',
			'text/plain'      => '.txt'
		);

		return isset( $extensions[ $mime_type ] ) ? $extensions[ $mime_type ] : '';
	}

	/**
	 * Did an error occur while sideloading the file?
	 *
	 * @param  array $file_attributes The file attribues, or array containing an 'error' key on failure.
	 *
	 * @return bool
	 */

	private function did_a_sideloading_error_occur( $file_attributes ) {
		return isset( $file_attributes['error'] );
	}

	/**
	 * Insert attachment into the WordPress Media Library.
	 *
	 * @param  string $file_path The path to the media file.
	 * @param  string $mime_type The MIME type of the media file.
	 */

	private function insert_attachment( $file_path, $mime_type ) {

		// Get the path to the uploads directory.
		$wp_upload_dir = wp_upload_dir();

		// Prepare an array of post data for the attachment.
		$attachment_data = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $file_path ),
			'post_mime_type' => $mime_type,
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $file_path ) ),
			'post_content'   => '',
			'post_status'    => 'inherit',
		);

		$attachment_meta_compared = array_merge( $attachment_data, array_intersect_key( $this->attachment_data , $attachment_data ) );
		$attachment_id = wp_insert_attachment( $attachment_meta_compared, $file_path );

		if ( ! $attachment_id ) {
			return;
		}

		$this->attachment_id = $attachment_id;

	}

	/**
	 * Update attachment metadata.
	 */

	private function update_metadata() {

		$file_path = get_attached_file( $this->attachment_id );

		if ( ! $file_path ) {
			return;
		}

		// Gives us access to the wp_generate_attachment_metadata() function.
		require_once ABSPATH . 'wp-admin/includes/image.php';

		// Generate metadata for the attachment and update the database record.
		$attach_data = wp_generate_attachment_metadata( $this->attachment_id, $file_path );
		wp_update_attachment_metadata( $this->attachment_id, $attach_data );

	}

	/**
	 * Update attachment title, caption and description.
	 */

	private function update_post_data() {

		if ( empty( $this->attachment_data['title'] ) && empty( $this->attachment_data['caption'] ) && empty( $this->attachment_data['description'] ) ) {
			return;
		}

		$data = array(
			'ID' => $this->attachment_id,
		);

		// Set image title (post title)
		if ( ! empty( $this->attachment_data['title'] ) ) {
			$data['post_title'] = $this->attachment_data['title'];
		}

		// Set image caption (post excerpt)
		if ( ! empty( $this->attachment_data['caption'] ) ) {
			$data['post_excerpt'] = $this->attachment_data['caption'];
		}

		// Set image description (post content)
		if ( ! empty( $this->attachment_data['description'] ) ) {
			$data['post_content'] = $this->attachment_data['description'];
		}

		wp_update_post( $data );

	}

	/**
	 * Update attachment alt text.
	 */

	private function update_alt_text() {

		if ( empty( $this->attachment_data['alt_text'] ) && empty( $this->attachment_data['title'] ) ) {
			return;
		}

		// Use the alt text string provided, or the title as a fallback.
		$alt_text = ! empty( $this->attachment_data['alt_text'] ) ? $this->attachment_data['alt_text'] : $this->attachment_data['title'];

		update_post_meta( $this->attachment_id, '_wp_attachment_image_alt', $alt_text );
	}

}