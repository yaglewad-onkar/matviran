<?php

	class NorExtraParser {

		static private $brand_color = 'empty';

		/**
		* Typography type parsing to CSS
		*/
		static public function VC_typo_to_CSS( $typo_value ) {
			$value = json_decode( str_replace( '``', '"', $typo_value ) );
			$result_css = '';

			if ( !$value ) return $result_css;

			if ( isset( $value->font_size ) && $value->font_size ) {
				$result_css .= 'font-size:' . $value->font_size . 'px;';
			}
			if ( isset( $value->line_height ) && $value->line_height ) {
				$result_css .= 'line-height:' . $value->line_height . 'px;';
			}
			if ( isset( $value->letter_spacing ) && $value->letter_spacing ) {
				$result_css .= 'letter-spacing:' . $value->letter_spacing . 'px;';
			}
			if ( isset( $value->weight ) && $value->weight != 'inherit' ) {
				$result_css .= 'font-weight:' . $value->weight . ';';
			}
			if ( isset( $value->color ) && $value->color ) {
				$result_css .= 'color:' . $value->color . ';';
			}

			if ( isset( $value->style ) ) {
				switch ( $value->style ) {
					case 'normal':
						$result_css .= 'font-style:normal;';
						break;
					case 'italic':
						$result_css .= 'font-style:italic;';
						break;
					case 'underline':
						$result_css .= 'text-decoration:underline;';
						break;
					case 'uppercase':
						$result_css .= 'text-transform:uppercase;';
						break;
				}
			}

			if ( isset( $value->use_custom_font ) && $value->use_custom_font ) {
				if ( isset( $value->custom_font ) && $value->custom_font ) {
					$result_css .= 'font-family: \'' . substr( $value->custom_font, 0, strrpos( $value->custom_font, ':' ) ) . '\';';
				}
			}

			return $result_css;
		}


		/**
		* Typography parse custom fonts
		*/
		static public function VC_typo_custom_font( $typo_value ) {
			$value = json_decode( str_replace( '``', '"', $typo_value ) );
			if ( !$value ) return false;

			$use_font = false;
			$font_key = false;
			if ( isset( $value->use_custom_font ) ) {
				$use_font = (bool) $value->use_custom_font;
			}
			if ( isset( $value->custom_font ) && $value->custom_font ) {
				$font_key = $value->custom_font;
			}

			if ( $use_font && $font_key ) {
				$exploded_font_key = explode( ':', $font_key );
				$font_key_array = array();
				$font_key_array['font'] = $exploded_font_key[0];
				$font_key_array['subsets'] = array();
				$font_key_array['variants'] = array();
				if ( $exploded_font_key[1] ) {
					foreach ( explode( ',', $exploded_font_key[1] ) as $variant ) {
						$font_key_array['variants'][] = $variant;
					}
				}
				$GLOBALS['ohio_google_fonts'][] = $font_key_array;

				return $font_key;
			} else {
				return false;
			}
		}


		/**
		* Columns type parsing to CSS
		*/
		static public function VC_columns_to_CSS( $value, $is_double = false ) {
			$value_array = explode( '-', $value );
			for ( $i = 0; $i < count( $value_array ); $i++ ) {
				switch ( intval( $value_array[$i] ) ) {
					case '1':
						$value_array[$i] = 12;
						break;
					case '2':
						$value_array[$i] = ( $is_double ) ? 12 : 6;
						break;
					case '3':
						$value_array[$i] = ( $is_double ) ? 8 : 4;
						break;
					case '4':
						$value_array[$i] = ( $is_double ) ? 6 : 3;
						break;
					case '5':
						$value_array[$i] = ( $is_double ) ? '2_5th' : '5th';
						break;
					case '6':
						$value_array[$i] = ( $is_double ) ? 4 : 2;
						break;
					case '12':
						$value_array[$i] = ( $is_double ) ? 2 : 1;
						break;
				}
			}
			$classes = '';

			if ( isset( $value_array[0] ) ) {
				$classes .= ' vc_col-lg-' . $value_array[0];
			}
			if ( isset( $value_array[1] ) ) {
				$classes .= ' vc_col-md-' . $value_array[1];
			}
			if ( isset( $value_array[2] ) ) {
				$classes .= ' vc_col-xs-' . $value_array[2];
			}

			return $classes;
		}


		/**
		* Color settings parsing to array
		*/
		static public function VC_color_to_CSS( $color, $css_line ) {
			if ( $color && $color != 'standard' ) {
				if ( $color == 'brand' ) {
					if ( self::$brand_color == 'empty' ) {
						self::$brand_color = OhioOptions::get_global( 'page_brand_color' );
					}
					return str_replace( '{{color}}', self::$brand_color, $css_line );
				} else {
					return str_replace( '{{color}}', $color, $css_line );
				}
			}
		}


		/**
		* Link params parsing
		*/
		static public function VC_link_params( $link_value, $default = array() ) {
			$result = array(
				'url' => '#',
				'caption' => '',
				'blank' => false
			);
			foreach ( $default as $key => $value ) {
				$result[$key] = $value;
			}
			$link_value = explode( '|', $link_value );
			if ( $link_value && count($link_value) > 0 ) {
				foreach ( $link_value as $link_attr ) {
					$link_attr = explode( ':', $link_attr );
					switch ( $link_attr[0] ) {
						case 'url':
							if ( NorExtraFilter::string( $link_attr[1], 'url' ) ) {
								$result['url'] = NorExtraFilter::string( $link_attr[1], 'url' );
							}
							break;
						case 'title':
							if ( NorExtraFilter::string( urldecode( $link_attr[1] ) ) ) {
								$result['caption'] = NorExtraFilter::string( urldecode( $link_attr[1] ) );
							}
							break;
						case 'target':
							$result['blank'] = NorExtraFilter::boolean( $link_attr[1] );
							break;
					}
				}
			}
			return $result;
		}


		/**
		* Button settings parsing to array
		*/
		static public function VC_button_to_css( $settings = array() ) {
			$css = $hover_css = $classes = '';
			if ( is_array( $settings ) ) {
				if ( ! isset( $settings['type'] ) ) $settings['type'] = false;
				if ( ! isset( $settings['hover-color'] ) ) $settings['hover-color'] = false;
				if ( ! isset( $settings['color'] ) ) $settings['color'] = false;
				if ( ! isset( $settings['squared'] ) ) $settings['squared'] = false;
				if ( ! isset( $settings['fullwidth'] ) ) $settings['fullwidth'] = false;
				if ( ! isset( $settings['size'] ) ) $settings['size'] = false;
				if ( ! isset( $settings['text-color'] ) ) $settings['text-color'] = false;
				if ( ! isset( $settings['text-hover-color'] ) ) $settings['text-hover-color'] = false;

				$color_css = '';
				$color_hover_css = '';

				if ( $settings['type'] != 'arrow_link' ) {
					switch( $settings['type'] ) {
						case 'outline':
							if ( $settings['color'] && $settings['color'] != 'brand' ) {
								$css .= 'border-color:' . $settings['color'] . ';';
								$hover_css .= 'background:' . $settings['color'] . ';';
								$color_css = 'color:' . $settings['color'] . ';';
								$color_hover_css = 'color:#fff;';
							}
							if ( $settings['hover-color'] ) {
								if ( $settings['hover-color'] == 'brand' ) {
									$classes .= ' brand-bg-color-hover-i brand-border-color-hover-i';
								} else {
									$hover_css .= 'background:' . $settings['hover-color'] . ';';
									$hover_css .= 'border-color:' . $settings['hover-color'] . ';';
									$color_hover_css = 'color:#fff;';
								}
							}
							break;
						case 'flat':
							if ( $settings['color'] && $settings['color'] != 'brand'  ) {
								$hover_css .= 'background:' . $settings['color'] . ';';
								$color_hover_css = 'color:#fff;';
							}
							if ( $settings['hover-color'] ) {
								if ( $settings['hover-color'] == 'brand' ) {
									$classes .= ' brand-bg-color-hover-i';
								} else {
									$hover_css .= 'background:' . $settings['hover-color'] . ';';
									$color_hover_css = 'color:#fff;';
								}
							}
							break;
						default:
							if ( $settings['color'] && $settings['color'] != 'brand'  ) {
								$css .= 'border-color:' . $settings['color'] . ';background-color:' . $settings['color'] . ';';
								$hover_css .= 'background:transparent;';
								$color_hover_css = 'color:' . $settings['color'] . ';';
							}
							if ( $settings['hover-color'] ) {
								if ( $settings['hover-color'] == 'brand' ) {
									$classes .= ' brand-border-color-hover-i';
								} else {
									$hover_css .= 'background: ' . $settings['hover-color'] . ';';
									$hover_css .= 'border-color:' . $settings['hover-color'] . ';';
									$color_hover_css .= 'color:' . $settings['hover-color'] . ';';
								}
							}
							break;
					}
				} else {
					$classes .= ' btn-link';
				}

				if (  $settings['type'] != 'arrow_link' ){

					if ( $settings['squared'] ) {
						$classes .= ' btn-squared';
					}

					if ( $settings['fullwidth'] ) {
						$classes .= ' btn-full-width';
					}

					switch ( $settings['size'] ) {
						case 'small':
							$classes .= ' btn-small';
							break;
						case 'large':
							$classes .= ' btn-large';
							break;
						case 'huge':
							$classes .= ' btn-large';
							break;
					}

					switch ( $settings['type'] ) {
						case 'outline':
							$classes .= ' btn-outline';
							break;
						case 'flat':
							$classes .= ' btn-flat';
							break;
					}
				}

				if ( $settings['color'] == 'brand' ) {
					$classes .= ' btn-brand';
				}

				if ( $settings['text-color'] ) {
					if ( $settings['text-color'] == 'brand' ) {
						$classes .= ' brand-color';
					} else {
						$color_css .= 'color: ' . $settings['text-color'] . ';';
					}
				}
				if ( $settings['text-hover-color'] ) {
					if ( $settings['text-hover-color'] == 'brand' ) {
						$classes .= ' brand-color-hover-i';
					} else {
						$color_hover_css .= 'color: ' . $settings['text-hover-color'] . ' !important;';
					}
				}
			}

			$css .= $color_css;
			$hover_css .= $color_hover_css;

			return array(
				'css' => $css,
				'hover-css' => $hover_css,
				'classes' => $classes
			);
		}

		/**
		* Date and time parsing to array
		*/
		static public function VC_datetime_to_array( $datetime_value ) {
			$result_arr = array(
				'year' => '2019',
				'month' => '1',
				'day' => '1',
				'hour' => '0',
				'minute' => '0',
				'second' => '0'
			);
			if ( !empty( $datetime_value ) ) {
				$time = strtotime( $datetime_value );
				$result_arr['year'] = date( 'Y', $time );
				$result_arr['month'] = date( 'n', $time );
				$result_arr['day'] = date( 'j', $time );
				$result_arr['hour'] = date( 'G', $time );
				$result_arr['minute'] = intval( date( 'i', $time ) );
				$result_arr['second'] = intval( date( 's', $time ) );
			}

			return $result_arr;
		}


		/**
		* Parse post data from object
		*/
		static public function post_object( $_post, $_context = 'index', $_index = false ) {
			$format = get_post_format( $_post->ID );
			// date
			$date = get_the_date( get_option( 'date_format' ), $_post->ID );
			// title
			$title = $_post->post_title;
			if ( ! $title ) {
				$title = '[' . $date . ']';
			}
			// url
			$url = get_permalink( $_post->ID );
			// author
			$author = get_the_author_meta( 'display_name', $_post->post_author );
			// categories
			$categories = wp_get_post_categories( $_post->ID );
			foreach ($categories as $_i => $_category) {
				$categories[$_i] = get_category( $_category );
			}
			// preview
			$content_preview = NorExtraParser::get_the_excerpt( $_post->ID );
			if ( ! $content_preview ) {
				$content_preview = preg_replace( '/\[.+?\]/', '', $_post->post_content );
			}
			$content_preview = strip_tags( $content_preview );
			if ( ! $content_preview ) {
				$content_preview = '';
			} elseif ( strlen( $content_preview ) > 105 ) {
				$_desc_first_space = substr( $content_preview, 105 );
				$_desc_first_space = 105 + strpos( $_desc_first_space, ' ');
				$content_preview = substr( $content_preview, 0, $_desc_first_space ) . '&hellip;';
			}
			// overlay
			$overlay = get_field( 'post_overlay_color', $_post->ID );
			// thumbnail
			$img_url = false;
			$thumbnail_size = $_post->image_size;
			$image_id = get_post_thumbnail_id( $_post->ID );
			if ( $image_id ) {
				$image = wp_get_attachment_image_src( $image_id, $thumbnail_size );
				if ( is_array( $image ) ) {
					$img_url = $image[0];
					// fix vertical images
					if ( $image[1] < $image[2] ) {
						$_image_basename = basename( get_attached_file( $image_id ) );
						$_image_new_basename = substr( $_image_basename, 0, strrpos( $_image_basename, '.' ) ) . '-' . $image[1] . 'x' . $image[1] . substr( $_image_basename, strrpos( $_image_basename, '.' ));
						$_image_new_uri = str_replace( $_image_basename, $_image_new_basename, get_attached_file( $image_id ) );
						$_image_new_url = str_replace( $_image_basename, $_image_new_basename, $image[0] );
						if ( file_exists( $_image_new_uri ) ) {
							$img_url = $_image_new_url;
						} else {
							$_image = wp_get_image_editor( get_attached_file( $image_id ) );
							if ( ! is_wp_error( $_image ) ) {
								$_image->resize( $image[1], $image[1] - ( (int) ( $image[1] / 3 ) ), true );
								if ( $_image->save( $_image_new_uri ) ) {
									$img_url = $_image_new_url;
								}
							}
						}
					}
				}
			}

			// check audio content
			$audio = false;
			if ( $format == 'audio' ) {
				preg_match( '/\[audio.+?\](\s)*(\[\/audio\])?/', $_post->post_content, $audio_matches);
				preg_match( '/\<iframe[^\>]*soundcloud\.com\/player[^\>]*>(\s)*(\<\/iframe\>)?/', $_post->post_content, $soundcloud_matches);
				if ( is_array( $audio_matches ) && $audio_matches ) {
					$audio = do_shortcode( $audio_matches[0] );
				}
				if ( is_array( $soundcloud_matches ) && $soundcloud_matches ) {
					if ( is_array( $audio_matches ) && $audio_matches ) {
						if ( strpos( $_post->post_content, $soundcloud_matches[0] ) < strpos( $_post->post_content, $audio_matches[0] ) ) {
							$audio = $soundcloud_matches[0];
						}
					} else {
						$audio = $soundcloud_matches[0];
					}
				}
			}
			// check video
			$video = false;
			if ( $format == 'video' ) {
				preg_match( '/\[video.+?\](\s)*(\[\/video\])?/', $_post->post_content, $video_matches );
				preg_match( '/(http:|https:)?\/\/(www\.)?youtube\.com\/watch?[^\s\"\]]*/', $_post->post_content, $youtube_link_matches );
				preg_match( '/(http:|https:)?\/\/(www\.)?vimeo\.com\/[\d]+[^\s\"\]]*/', $_post->post_content, $vimeo_link_matches );
				preg_match( '/\<iframe[^\>]*youtube\.com\/embed[^\>]*>(\s)*(\<\/iframe\>)?/', $_post->post_content, $youtube_frame_matches );
				preg_match( '/\<iframe[^\>]*vimeo\.com\/video[^\>]*>(\s)*(\<\/iframe\>)?/', $_post->post_content, $vimeo_frame_matches );
				if ( is_array( $video_matches ) && $video_matches ) {
					$video = do_shortcode( $video_matches[0] );
				}
				if ( is_array( $vimeo_link_matches ) && $vimeo_link_matches ) {
					$video_key = substr( $vimeo_link_matches[0], strpos( $vimeo_link_matches[0], 'vimeo.com/' ) + 10 );
					$video = '<iframe src="https://player.vimeo.com/video/' . $video_key . '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="0"></iframe>';
				}
				if ( is_array( $vimeo_frame_matches ) && $vimeo_frame_matches ) {
					$vimeo_frame_matches[0] = preg_replace( array( '/height\=\"[\d]+?\"/', '/width\=\"[\d]+?\"/' ), '', $vimeo_frame_matches[0] );
					$video = do_shortcode( $vimeo_frame_matches[0] );
				}
				if ( is_array( $youtube_link_matches ) && $youtube_link_matches ) {
					$video_key = substr( $youtube_link_matches[0], strpos( $youtube_link_matches[0], 'v=' ) + 2 );
					$video = '<iframe src="https://www.youtube.com/embed/' . $video_key . '" frameborder="0" allowfullscreen></iframe>';
				}
				if ( is_array( $youtube_frame_matches ) && $youtube_frame_matches ) {
					$youtube_frame_matches[0] = preg_replace( array( '/height\=\"[\d]+?\"/', '/width\=\"[\d]+?\"/' ), '', $youtube_frame_matches[0] );
					$video = do_shortcode( $youtube_frame_matches[0] );
				}
			}
			// check blockquote content
			$blockquote = false;
			if ( $format == 'quote' ) {
				preg_match( '/\<blockquote(.|\s)*?\>(.|\s)+?\<\/blockquote\>/', $_post->post_content, $blockquotes_matches );
				if ( is_array( $blockquotes_matches ) && $blockquotes_matches ) {
					$blockquote = $blockquotes_matches[0];
				}
			}
			// check gallery content
			$gallery = false;
			if ( $format == 'gallery' ) {
				preg_match( '/\[gallery.*?\]/', $_post->post_content, $galleries_matches );
				if ( is_array( $galleries_matches ) && $galleries_matches ) {
					$gallery = do_shortcode( $galleries_matches[0] );
				}
			}
			if ( get_field( 'blog_item_layout_type' ) && get_field( 'blog_item_layout_type' ) != 'inherit' ) {
				$boxed = (bool) get_field( 'blog_items_boxed_style' );
			} else {
				$boxed = (bool) get_field( 'global_blog_items_boxed_style', 'option' );
			}
			// grid style
			$grid_style = get_field( 'post_style_in_grid', $_post->ID );

			$animation_type = false;
			$animation_effect = false;

			switch ( $_context ) {
				/*case 'blog_template':
					$animation_type = false;
					$animation_effect = false;
					break;
				case 'portfolio_template':
					$animation_type = false;
					$animation_effect = false;
					break;*/
				case 'index':
				default:
					$animation_type = get_field( 'global_blog_page_animation_type', 'option' );
					if ( in_array( $animation_type, array( 'sync', 'async' ) ) ) {
						$animation_effect = get_field( 'global_blog_page_animation_effect', 'option' );
						if ( ! $animation_effect ) {
							$animation_effect = 'fade-up';
						}
					}
					break;
			}


			return array(
				'index' => $_index,
				'post_id' => $_post->ID,
				'date' => $date,
				'media' => array(
					'image' => $img_url,
					'audio' => $audio,
					'video' => $video,
					'gallery' => $gallery,
					'blockquote' => $blockquote
				),
				'url' => $url,
				'title' => $title,
				'preview' => $content_preview,
				'overlay' => $overlay,
				'categories' => $categories,
				'author' => $author,
				'author_id' => $_post->post_author,
				'boxed' => $boxed,
				'grid_style' => $grid_style,
				'animation_effect' => $animation_effect,
				'animation_type' => $animation_type
			);
		}


		/*
		* Project post
		*/
		static public function project_object( $post ) {
			$project = array();
			// title
			$project['title'] = get_the_title( $post->ID );
			if ( ! $project['title'] ) {
				$project['title'] = '[' . get_the_date( get_option( 'date_format' ), $post->ID ) . ']';
			}
			// description
			$project['description'] = trim( get_field( 'project_description', $post->ID ) );
			$project['short_description'] = strip_tags( trim( get_field( 'project_description', $post->ID ) ) );
			if ( ! $project['short_description'] ) {
				$project['short_description'] = '';
			} elseif ( strlen( $project['short_description'] ) > 200 ) {
				$_desc_first_space = substr( $project['short_description'], 200 );
				$_desc_first_space = 200 + strpos( $_desc_first_space, ' ');
				$project['short_description'] = substr( $project['short_description'], 0, $_desc_first_space ) . '&hellip;';
			}

			// Visible
			$project['category_visible'] = OhioOptions::get( 'page_category_visibility', true );
			$project['more_visible'] = OhioOptions::get( 'page_more_visibility', true );

			// images
			$project['images'] = get_field( 'project_content', $post->ID );
			$thumbnail_sizes = $project['images'][0]['sizes'];

			$project['images_full'] = array();
			if ( is_array( $project['images'] ) && count( $project['images'] ) > 0 ) {
				foreach ( $project['images'] as $key => $value ) {
					if ( $value && is_string( $value ) ) {
						$project['images'][$key] = wp_get_attachment_url( $value );
						$project['images_full'][$key] = wp_get_attachment_url( $value, 'full' );
					}
					elseif ( is_array( $value ) && isset( $value['sizes'] ) && isset( $value['sizes']['large'] ) ) {
						$project['images'][$key] = $value['sizes']['large'];

						if ( isset( $value['sizes']['ohio_full'] ) ) {
							$project['images_full'][$key] = $value['sizes']['ohio_full'];
						} else {
							$project['images_full'][$key] = $value['sizes']['large'];
						}
					}
				}
			} else {
				$project['images'] = array();
				$project['images_full'] = array();
			}

			// Featured image
			$thumbnail_size = $post->image_size ?? 'medium';

			if( $thumbnail_size ) {
				$project['featured_image'] = get_the_post_thumbnail_url( $post->ID, $thumbnail_size );
			}
			else {
				$project['featured_image'] = get_the_post_thumbnail_url( $post->ID, 'full' );
			}
			

			if ( get_the_post_thumbnail_url( $post->ID, 'ohio_full' ) ) {
				$project['featured_image_full'] = get_the_post_thumbnail_url( $post->ID, 'ohio_full' );
			} else {
				$project['featured_image_full'] = get_the_post_thumbnail_url( $post->ID, 'full' );
			}

			// If .gif then get full size
			if( $project['featured_image'] && pathinfo( $project['featured_image'], PATHINFO_EXTENSION ) == 'gif' ){
				$project['featured_image'] = get_the_post_thumbnail_url( $post->ID, 'full' );
			}

			// If thumbnail empty
			if( ! $project['featured_image'] && is_array( $project['images'] ) && count( $project['images'] ) > 0 ){

				// If .gif then get full size
				if( $project['images'][0] && pathinfo( $project['images'][0], PATHINFO_EXTENSION ) == 'gif' ){
					$project['featured_image'] = $project['images_full'][0];
				} else {
					$project['featured_image'] = $thumbnail_sizes[$thumbnail_size];
				}

				$project['featured_image_full'] = $project['images_full'][0];
			}

			$project['featured_as_gallery_item'] = OhioOptions::get( 'project_add_featured_to_gallery', true, $post->ID );

			// info
			$project['date'] = get_field( 'project_date', $post->ID );
			$project['design'] = get_field( 'project_design', $post->ID );
			$project['strategy'] = get_field( 'project_strategy', $post->ID );
			$project['client'] = get_field( 'project_client', $post->ID );
			$project['link'] = get_field( 'project_link', $post->ID );
			$project['tags'] = get_field( 'project_tags', $post->ID );
			// custom info
			$project['custom_fields'] = array();
			$_custom_fields = get_field( 'project_custom_fields', $post->ID );
			if ( is_array( $_custom_fields ) && $_custom_fields ) {
				foreach ( $_custom_fields as $field ) {
					$project['custom_fields'][] = array(
						'title' => $field['project_custom_field_title'],
						'value' => $field['project_custom_field_value']
					);
				}
			}
			// show navigation
			$project['show_navigation'] = get_field( 'project_show_navigation', $post->ID );
			if ( $project['show_navigation'] == 'inherit' ) {
				$project['show_navigation'] = get_field( 'global_project_show_navigation', 'option' );
			}
			// bradcrumbs
			$project['hide_breadcrumbs'] = get_field( 'project_hide_breadcrumbs', $post->ID );
			if ( $project['hide_breadcrumbs'] == 'inherit' ) {
				$project['hide_breadcrumbs'] = get_field( 'global_project_hide_breadcrumbs', 'option' );
			} else {
				$project['hide_breadcrumbs'] = ( get_field( 'project_hide_breadcrumbs' ) == 'yes' );
			}
			// sharing
			$project['hide_sharing'] = get_field( 'global_project_hide_sharing_buttons', 'option' );
			$project['sharing_links'] = get_field( 'global_project_social_sharing_buttons', 'option' );
			// portfolio link
			$project['link_to_all'] = get_field( 'global_portfolio_page', 'option' );
			if ( ! $project['link_to_all'] ) {
				$project['link_to_all'] = esc_url( home_url( '/' ) );
			}
			// categories
			$_categories = wp_get_post_terms( $post->ID, 'ohio_portfolio_category' );
			$project['categories'] = $_categories;
			if ( $project['categories'] && is_array( $project['categories'] ) && count( $project['categories'] ) > 0 ) {
				$_project_categories = array();
				foreach ($project['categories'] as $category) {
					$_project_categories[] = '<span class="brand-color brand-border-color">' . $category->name . '</span>';
				}
				$project['categories'] = implode( ' ', $_project_categories );
			} else {
				$project['categories'] = '';
			}
			$project['categories_plain'] = $_categories;
			if ( $project['categories_plain'] && is_array( $project['categories_plain'] ) && count( $project['categories_plain'] ) > 0 ) {
				$_project_categories = array();
				foreach ($project['categories_plain'] as $category) {
					$_project_categories[] = $category->name;
				}
				$project['categories_plain'] = implode( ', ', $_project_categories );
			} else {
				$project['categories_plain'] = '';
			}
			$project['categories_group'] = $_categories;
			if ( $project['categories_group'] && is_array( $project['categories_group'] ) && count( $project['categories_group'] ) > 0 ) {
				$_project_categories = array();
				foreach ($project['categories_group'] as $category) {
					$_project_categories[] = 'ohio-filter-project-' . hash( 'md4', $category->slug, false );
				}
				$project['categories_group'] = implode( ' ', $_project_categories );
			} else {
				$project['categories_group'] = '';
			}
			// next n prev
			$project['next'] = get_adjacent_post( false, '', false );
			if ( is_a( $project['next'], 'WP_Post' ) ) {
				$images = get_field( 'project_content', $project['next']->ID );
				$image = ( is_array( $images ) && count( $images ) > 0 ) ? $images[0] : false;
				if ( $image && is_string( $image ) ) {
					$image = wp_get_attachment_url( $image );
				} elseif ( is_array( $image ) ) {
					$image = $image['sizes']['thumbnail'];
				}
				$project['next'] = array(
					'title' => $project['next']->post_title,
					'url' => get_post_permalink( $project['next']->ID ),
					'image' => $image
				);
			} else {
				$project['next'] = false;
			}
			$project['prev'] = get_adjacent_post( false, '', true );
			if ( is_a( $project['prev'], 'WP_Post' ) ) {
				$images = get_field( 'project_content', $project['prev']->ID );
				$image = ( is_array( $images ) && count( $images ) > 0 ) ? $images[0] : false;
				if ( $image && is_string( $image ) ) {
					$image = wp_get_attachment_url( $image );
				} elseif ( is_array( $image ) ) {
					$image = $image['sizes']['thumbnail'];
				}
				$project['prev'] = array(
					'title' => $project['prev']->post_title,
					'url' => get_post_permalink( $project['prev']->ID ),
					'image' => $image
				);
			} else {
				$project['prev'] = false;
			}
			// overlay color
			$project['overlay'] = get_field( 'project_overlay_color', $post->ID );
			if ( ! $project['overlay'] ) {
				$project['overlay'] = false;
			}
			// grid
			$project['grid_style'] = get_field( 'project_style_in_grid', $post->ID );
			// popup
			$project['in_popup'] = false;
			$project['popup_id'] = uniqid( 'ohio-lightbox-' );
			switch ( get_field( 'project_open_type', $post->ID ) ) {
				case 'external_target':
					$project['url'] = $project['link'];
					$project['external'] = false;
					break;
				case 'external_blank':
					$project['url'] = $project['link'];
					$project['external'] = true;
					break;
				case 'project':
				default:
					$project['url'] = get_post_permalink( $post->ID );
					$project['external'] = false;
					break;
			}
			return $project;
		}

		/*
		* Get post excerpt
		*/
		static public function get_the_excerpt( $post_id ) {
			global $post;
			$save_post = $post;
			$post = get_post( $post_id );
			$output = get_the_excerpt();
			$post = $save_post;
			return $output;
		}

		// TODO: Remove after theme update and swap calls
		static public function get_current_pagenum() {
			$pagination_page = 1;
	
			if ( get_query_var( 'paged' ) ) {
				$pagination_page = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$pagination_page = get_query_var( 'page' );
			} elseif ( isset( $_POST['paged'] ) ) {
				$pagination_page = $_POST['paged'];
			} elseif ( isset( $_GET['paged'] ) ) {
				$pagination_page = $_GET['paged'];
			}
	
			return max( 1, (int)$pagination_page );
		}

		static public function shortcodeInBase64( $base, $atts ) {
			$result = '[' . $base;
			foreach ($atts as $k => $v) {
				$result .= ' ' . $k . '="' . $v . '"';
			}
			$result .= ']';

			return base64_encode( $result );
		}

		/**
		 * Generates all needed attributes for responsive image by id
		 *
		 * @param mixed $id
		 * @param string $title
		 * @return string
		 */
		static public function generateImageAttsById( $id, $title = '' ) {
			if ( ! $id ) return '';

			$atts  = 'src="' . wp_get_attachment_image_url( $id, 'large' ) . '" ';
			$atts .= 'srcset="' . wp_get_attachment_image_srcset( $id, 'large' ) . '" ';
			$atts .= 'sizes="' . wp_get_attachment_image_sizes( $id, 'large' ) . '" ';
			if ( ! empty( $title ) ) {
				$atts .= 'alt="' . esc_attr( $title ) . '" ';
			} else {
				$atts .= 'alt="' . esc_attr( get_post_meta( $id, '_wp_attachment_image_alt', true ) ) . '" ';
			}

			return $atts;
		}

	}
