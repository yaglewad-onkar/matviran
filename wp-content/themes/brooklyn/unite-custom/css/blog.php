<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Blog_CSS' ) ) {	
    
    class UT_Blog_CSS extends UT_Custom_CSS { 
        
        public function custom_css() {

            ob_start(); ?>
            
            <style id="ut-blog-custom-css" type="text/css">

            <?php if( ut_is_blog_related() && ot_get_option('ut_blog_layout', 'classic') != 'classic' && ot_get_option( 'ut_blog_background_color', ot_get_option('ut_site_border_body_color') ) ) {

                echo '
                    .blog .main-content-background,
                    .archive:not(.woocommerce) .main-content-background,
                    .search .main-content-background,
                    .post.ut-blog-grid-article, 
                    .post.ut-blog-list-article { background: ' . ot_get_option( 'ut_blog_background_color', ot_get_option('ut_site_border_body_color') ) . '; }';

            } ?>
                
                
            <?php
            
            /**
             * Hero Title Font 
             */
            
            if( is_home() || ( is_single() && !is_singular( 'portfolio' ) && !is_singular( 'product' ) ) ) {
                
                echo $this->font_style_css( array(
                    'selector'           => '.hero-title',
                    'font-type'          => ot_get_option('ut_blog_hero_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blog_hero_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blog_hero_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blog_hero_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_blog_hero_custom_font_style')
                ) ); 
            
            }
            
            ?>
                                    
            /**
             * Title Highlight
             */            
            .entry-title span {
                color: <?php echo $this->accent; ?>; 
            }
                        
            /**
             * Blog Pagination
             */

			<?php 
			
			$ut_blog_pagination_background_color = ot_get_option( 'ut_blog_pagination_background_color' );

			if( $ut_blog_pagination_background_color && $this->is_gradient( $ut_blog_pagination_background_color ) ) : 

				echo $this->create_gradient_css( $ut_blog_pagination_background_color, '#ut-blog-navigation', false, 'background' ); ?>

			<?php elseif( $ut_blog_pagination_background_color ) : ?>

				#ut-blog-navigation { background: <?php echo ot_get_option('ut_blog_pagination_background_color'); ?>;} 

			<?php endif; ?>	
				
            <?php if( ot_get_option('ut_blog_pagination_height') ) : ?>
                
               #ut-blog-navigation { height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}
               #ut-blog-navigation .fa { line-height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}
			   #ut-blog-navigation i { line-height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_color') ) : ?>
                
               #ut-blog-navigation a { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}
               #ut-blog-navigation a:visited { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}  
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ) ) : ?>
                
               #ut-blog-navigation a:hover { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;} 
               #ut-blog-navigation a:active { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;}
                
            <?php endif; ?>           
            
                
            /**
             * Blog Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-classic-article .ut-quote-post-block, .blog .ut-blog-classic-article h2.entry-title, .archive .ut-blog-classic-article h2.entry-title, .search .ut-blog-classic-article h2.entry-title', ot_get_option('ut_global_blog_titles_font_style') ); ?>
                <?php echo $this->typography_css('.blog .ut-blog-mixed-large-article .ut-quote-post-block, .blog .ut-blog-mixed-large-article h2.entry-title, .archive .ut-blog-mixed-large-article h2.entry-title, .search .ut-blog-mixed-large-article h2.entry-title', ot_get_option('ut_global_blog_titles_font_style') ); ?>
                
            <?php endif; ?>
                
            <?php if( ot_get_option('ut_global_grid_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-grid-article .ut-quote-post-block, .blog .ut-blog-grid-article h2.entry-title, .archive .ut-blog-grid-article h2.entry-title, .search .ut-blog-grid-article h2.entry-title', ot_get_option('ut_global_grid_blog_titles_font_style') ); ?>
            
            <?php endif; ?>
                
                
            <?php if( ot_get_option('ut_global_list_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog .ut-blog-list-article .ut-quote-post-block, .blog .ut-blog-list-article h2.entry-title, .archive .ut-blog-list-article h2.entry-title, .search .ut-blog-list-article h2.entry-title', ot_get_option('ut_global_list_blog_titles_font_style') ); ?>
            
            <?php endif; ?>    
            
            .ut-blog-has-animation article.BrooklynFadeInUp,
            .ut-blog-has-animation #secondary.BrooklynFadeInUp {
                visibility: visible;
                    -webkit-animation-fill-mode: both;
                            animation-fill-mode: both;
                -webkit-animation: BrooklynFadeInUp 0.6s cubic-bezier(.39,.58,.57,1);
                   -moz-animation: BrooklynFadeInUp 0.6s cubic-bezier(.39,.58,.57,1);
                        animation: BrooklynFadeInUp 0.6s cubic-bezier(.39,.58,.57,1);
            }    
                
            /**
             * Single Post Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_single_titles_font_style') ) : ?>
                
                <?php echo $this->typography_css('.single-post h1.entry-title', ot_get_option('ut_global_blog_single_titles_font_style') ); ?>
            
            <?php endif; ?>

            <?php if( ot_get_option('ut_global_blog_single_sub_titles_font_style') ) : ?>

                <?php echo $this->typography_css('.single-post .single-post-entry-sub-title', ot_get_option('ut_global_blog_single_sub_titles_font_style') ); ?>

            <?php endif; ?>
            
                
            /**
             * Elements Border
             */
            
            <?php if( ot_get_option( 'ut_blog_avatar_border', 'on' ) == 'off' ) : ?>                
                
                .ut-hero-meta-author .ut-entry-avatar-image img, 
                .ut-archive-hero-avatar img,
                .author-avatar img,
                .comment-avatar .avatar {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;    
                }
                
            <?php endif; ?>

            <?php if( ot_get_option( 'ut_author_avatar_border', 'off' ) == 'on' ) : ?>

                .ut-archive-hero-avatar img {
                    border: none;
                }

            <?php endif; ?>
            
            <?php if( ot_get_option( 'ut_blog_button_border', 'off' ) == 'off' ) : ?>
                
                button, input[type="button"], 
                input[type="submit"], 
                .dark button, 
                .dark input[type="button"], 
                .dark input[type="submit"],
                .light button, 
                .light input[type="submit"], 
                .light input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;    
                }
                
            <?php endif; ?>                
                
            <?php if( ot_get_option( 'ut_blog_elements_border', 'on' ) == 'off' ) : ?>
                
                pre,
                .wp-caption img, 
                img[class*="wp-image-"],
                .ut-blog-layout-list-article-inner,
                .ut-blog-grid-article-inner,
                .ut-blog-classic-article .entry-thumbnail,
                .ut-blog-grid .entry-thumbnail figure,
                .ut-blog-classic-article .ut-gallery-slider,
                .ut-blog-mixed-large-article-large,
                #commentform .comment-form-comment textarea,
                #commentform .comment-form-author input,
                #commentform .comment-form-email input,
                #commentform .comment-form-url input,
                .ut-format-link,
                .format-link .entry-header a,
                .comment-body,
                .ut-quote-post,
                .ut_widget_flickr li img {
                    -webkit-border-radius:0;
                        -moz-border-radius:0;
                            border-radius:0;   
                }

            <?php endif; ?>    
            
            
            <?php if( ot_get_option( 'ut_blog_elements_border', 'on' ) == 'on' && ot_get_option( 'ut_blog_elements_border_radius' ) ) : ?>    
                
                pre,
                .wp-caption img, 
                img[class*="wp-image-"],
                .ut-blog-layout-list-article-inner,
                .ut-blog-grid-article-inner,
                .ut-blog-classic-article .entry-thumbnail,
                .ut-blog-classic-article .ut-gallery-slider,
                .ut-blog-mixed-large-article-large,
                .ut-blog-has-animation .post,
                #commentform .comment-form-comment textarea,
                #commentform .comment-form-author input,
                #commentform .comment-form-email input,
                #commentform .comment-form-url input,
                .ut-format-link,
                .format-link .entry-header a,
                .comment-body,
                .ut-quote-post,
                .ut_widget_flickr li img {
                    -webkit-border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;
                        -moz-border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;
                            border-radius:<?php echo ot_get_option( 'ut_blog_elements_border_radius','4' ); ?>px;   
                }

                <?php if( is_archive() && ot_get_option("ut_blog_archive_hide_meta_categories", 'off') == 'off' ) : ?>

                    .ut-blog-grid .entry-thumbnail figure {
                        border-top-right-radius: 0;
                        border-top-left-radius: 0;
                    }

                <?php endif; ?>


            <?php endif; ?>
                
                
            /**
             * Post Formats
             */    
            
            .ut-quote-post {
                background: <?php echo $this->accent; ?>;                    
            }                
            
            .format-quote .ut-quote-post-link:hover .ut-quote-post blockquote,
            .format-quote .ut-quote-post-link:active .ut-quote-post blockquote {
                border-color: <?php echo $this->accent; ?>;
            }
            
            .single-post .ut-quote-post blockquote {
                border-color: <?php echo $this->accent; ?>;
            }
            
            
            /**
             * Author Bio
             */

            <?php if( ot_get_option("ut_author_archive_text_color") ) : ?>

                .author-bio {
                    color: <?php echo ot_get_option("ut_author_archive_text_color"); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_author_archive_link_color") ) : ?>      
                
                .author-link {
                    color: <?php echo ot_get_option("ut_author_archive_link_color"); ?>;    
                }
            
            <?php endif; ?>    
                
                
            <?php if( ot_get_option("ut_author_archive_link_color_hover") ) : ?>    
                
                .author-link:hover, 
                .author-link:active {
                    color: <?php echo ot_get_option("ut_author_archive_link_color_hover"); ?>;
                }    
            
            <?php endif; ?>         
            
            <?php if( ot_get_option("ut_author_archive_link_arrow_color") ) : ?>      
                
                .author-link i {
                    color: <?php echo ot_get_option("ut_author_archive_link_arrow_color"); ?>;    
                }
            
            <?php endif; ?>     
                
            <?php if( ot_get_option("ut_author_archive_link_arrow_color_hover") ) : ?>      
                
                .author-link:hover i {
                    color: <?php echo ot_get_option("ut_author_archive_link_arrow_color_hover"); ?>;    
                }
            <?php else: ?>
                
                .author-link:hover i {
                    color: <?php echo $this->accent; ?>;
                } 
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_author_bio_social_icon_color") ) : ?>      
                
                .author-social-links a {
                    color: <?php echo ot_get_option("ut_author_bio_social_icon_color"); ?>;    
                }
            
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_author_bio_social_icon_color_hover") ) : ?>    
                
                .author-social-links a:hover, 
                .author-social-links a:active {
                    color: <?php echo ot_get_option("ut_author_bio_social_icon_color_hover"); ?>;
                }    
            
            <?php else : ?>    
                
                .author-social-links a:hover, 
                .author-social-links a:active {
                    color: <?php echo $this->accent; ?>;
                }
                
            <?php endif; ?>    
            
            
            /**
             * Blog Overview Colors
             */     
            
            <?php if( ot_get_option("ut_blog_overview_article_title_color", ot_get_option('ut_global_h2_font_color') ) ) : ?>
                
                .blog .ut-blog-classic-article h2.entry-title a,
                .blog .ut-blog-mixed-large-article-large h2.entry-title a,
                .blog .ut-blog-layout-list h2.entry-title,
                .blog .ut-blog-grid h2.entry-title,
                .archive .ut-blog-grid h2.entry-title, 
                .search .ut-blog-grid h2.entry-title,
				.comment-author h6 a {
                    color: <?php echo ot_get_option("ut_blog_overview_article_title_color", ot_get_option('ut_global_h2_font_color') ); ?>;
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_article_title_color_hover") ) : ?>    
                
                .blog .ut-blog-classic-article h2.entry-title a:hover,
                .blog .ut-blog-classic-article h2.entry-title a:active,
                .blog .ut-blog-mixed-large-article-large h2.entry-title a:hover,
                .blog .ut-blog-mixed-large-article-large h2.entry-title a:active,
                .blog .ut-blog-layout-list h2.entry-title:hover,
                .blog .ut-blog-grid h2.entry-title:hover,
                .archive .ut-blog-grid h2.entry-title:hover,
                .search .ut-blog-grid h2.entry-title:hover,
                .comment-author h6 a:hover,
				.comment-author h6 a:active {
                    color: <?php echo ot_get_option("ut_blog_overview_article_title_color_hover"); ?>;    
                }
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_overview_meta_icon_color") ) : ?>    
                
                .reply-link i, .edit-link i, .tags-links i, .entry-meta i {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_overview_meta_link_color") ) : ?>    
                
                .entry-meta a {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_link_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_meta_link_color_hover") ) : ?>    
                
                .entry-meta a:hover,
                .entry-meta a:active {
                    color: <?php echo ot_get_option("ut_blog_overview_meta_link_color_hover"); ?>;    
                }
                
            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_border_color") ) : ?>

                .ut-blog-grid .entry-meta:not(.entry-meta-top),
                .ut-blog-layout-list .entry-meta.entry-meta-top,
                .ut-blog-layout-list .entry-meta:not(.entry-meta-top),
                .ut-blog-layout-list .ut-post-thumbnail.ut-post-thumbnail-empty .entry-thumbnail {
                    border-color: <?php echo ot_get_option("ut_blog_overview_border_color"); ?>;
                }

                .ut-blog-grid-article-inner,
                .ut-blog-layout-list-article-inner,
                .ut-blog-mixed-large-article-large {
                    border-color: <?php echo ot_get_option("ut_blog_overview_border_color"); ?>;
                }

                .blog .date-format,
                .entry-meta-top-has-border {
                    border-color: <?php echo ot_get_option("ut_blog_overview_border_color"); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_background_color") ) : ?>

                .ut-blog-layout-list-article-inner,
                .ut-blog-layout-list .entry-meta.entry-meta-top,
                .ut-blog-layout-list .entry-meta:not(.entry-meta-top),
                .ut-blog-grid .entry-meta.entry-meta-top,
                .ut-blog-grid .entry-meta:not(.entry-meta-top),
                .ut-blog-grid-article-inner,
                .ut-blog-mixed-large-article-large {
                    background: <?php echo ot_get_option("ut_blog_overview_background_color"); ?>;
                }

                <?php if( ot_get_option('ut_force_single_post_article_spacing', 'off' ) == 'on' ) : ?>

                    .single-post .ut-blog-classic-article {
                        padding-top: 20px !important;
                        padding-bottom: 20px !important;
                        padding-right: 10px;
                        padding-left: 10px;
                    }

                    @media (min-width: 1025px) {

                        .single-post .ut-blog-classic-article {
                            padding-top: 40px !important;
                            padding-bottom: 40px !important;
                            padding-right: 30px;

                        }

                    }

                <?php endif; ?>

                @media (min-width: 1025px) {

                    .ut-blog-classic-article,
                    .ut-blog-has-animation .ut-blog-classic-article {
                        background: <?php echo ot_get_option("ut_blog_overview_background_color"); ?>;
                    }

                }

                .ut-blog-classic-article,
                .ut-blog-has-animation .ut-blog-classic-article {
                    background: <?php echo ot_get_option("ut_blog_overview_background_color"); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option('ut_blog_overview_meta_link_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.entry-meta a', ot_get_option('ut_blog_overview_meta_link_font_style') ); ?>                
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_read_more_color") ) : ?>

                .more-link,
                .more-link .more-link,
                .comment-footer .comment-reply-link,
                .comment-footer a:not(.comment-edit-link) {
                    color: <?php echo ot_get_option("ut_blog_read_more_color"); ?>;
                }
                
            <?php endif; ?>
                
            <?php if( ot_get_option("ut_blog_read_more_color_hover") ) : ?>    
                
                .more-link:hover,
				.more-link:active,
                .more-link:hover .more-link,
                .more-link:active .more-link,
				.comment-footer a:hover,
				.comment-footer a:active,
                .comment-footer .comment-reply-link:hover,
                .comment-footer .comment-reply-link:active,
                .comment-edit-link:hover,
                .comment-edit-link:active {
                    color: <?php echo ot_get_option("ut_blog_read_more_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_read_more_icon_color") ) : ?>    
                
                .more-link i,
				.comment-reply-link i {
                    color: <?php echo ot_get_option("ut_blog_read_more_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_read_more_icon_color_hover") ) : ?>    
                
                .more-link:hover i, 
				.more-link:active i,
				.comment-reply-link:hover i,
				.comment-reply-link:active i {
                    color: <?php echo ot_get_option("ut_blog_read_more_icon_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option('ut_blog_read_more_font_style') ) : ?>

                <?php echo $this->typography_css('.more-link, .comment-reply-link, .comment-footer a:not(.comment-edit-link)', ot_get_option('ut_blog_read_more_font_style') ); ?>
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_read_more_align') ) : ?>
                 
                .more-link .more-link { text-align: <?php echo ot_get_option('ut_blog_read_more_align'); ?>; }
                
            <?php endif; ?>

            <?php if( ot_get_option('ut_comment_date_color') ) : ?>

                .comment-metadata a {
                    color: <?php echo ot_get_option('ut_comment_date_color'); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option('ut_comment_date_color_hover') ) : ?>

                .comment-metadata a:hover,
                .comment-metadata a:active {
                    color: <?php echo ot_get_option('ut_comment_date_color_hover'); ?>;
                }

            <?php endif; ?>


            <?php if( ot_get_option('ut_comment_edit_link_color') ) : ?>

                .comment-footer .comment-edit-link {
                    color: <?php echo ot_get_option('ut_comment_edit_link_color'); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option('ut_comment_edit_link_color_hover') ) : ?>

                .comment-footer .comment-edit-link:hover {
                    color: <?php echo ot_get_option('ut_comment_edit_link_color_hover'); ?>;
                }

            <?php endif; ?>

			<?php if( ot_get_option('ut_comment_form_label_color') ) : ?>
                 
                #searchform label,
                #commentform label,
                .comment-awaiting-moderation {
                    color: <?php echo ot_get_option('ut_comment_form_label_color'); ?>;
                }
                
            <?php endif; ?>

            <?php if( ot_get_option('ut_comment_form_text_color') ) : ?>

                #searchform input,
                #commentform input,
                #searchform input:focus,
                #commentform input:focus {
                    color: <?php echo ot_get_option('ut_comment_form_text_color'); ?>;
                }

                #searchform textarea,
                #commentform textarea,
                #searchform textarea:focus,
                #commentform textarea:focus {
                    color: <?php echo ot_get_option('ut_comment_form_text_color'); ?>;
                }

            <?php endif; ?>
				
			<?php if( ot_get_option('ut_comment_form_label_font_style') ) : ?>
                 
                <?php echo $this->typography_css('#searchform label, .comment-awaiting-moderation, #commentform label', ot_get_option('ut_comment_form_label_font_style') ); ?>                
                
            <?php endif; ?>	
				
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_color") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a {
                    color: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_color"); ?>;    
                }
                
            <?php endif; ?>    
            
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_background_color") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a {
                    background: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_background_color"); ?>;    
                }
                
            <?php endif; ?>                     
            
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_color_hover") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a:hover,
                .ut-gallery-slider .flex-direction-nav a:active {
                    color: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
                
            <?php if( ot_get_option("ut_blog_overview_gallery_arrow_background_color_hover") ) : ?>    
                
                .ut-gallery-slider .flex-direction-nav a:hover,
                .ut-gallery-slider .flex-direction-nav a:active {
                    background: <?php echo ot_get_option("ut_blog_overview_gallery_arrow_background_color_hover"); ?>;    
                }
                
            <?php endif; ?>    
            
                
            /**
             * Meta Post Icons
             */  
                
            <?php if( ot_get_option("ut_blog_overview_pformat_icon_color") ) : ?>    
                
                .ut-meta-post-icon i,
                .post .ut-post-thumbnail .ut-video-module-play-icon {
                    color: <?php echo ot_get_option("ut_blog_overview_pformat_icon_color"); ?>;    
                }
                
            <?php endif; ?>    
                
            .ut-meta-post-icon,
            .post .ut-post-thumbnail .ut-video-module-play-icon {
                background: <?php echo ot_get_option("ut_blog_overview_pformat_icon_background_color", $this->accent ); ?>;    
            }   
                
            /**
             * Blog Date Colors for Classic Blog
             */

            <?php if( ot_get_option("ut_blog_overview_date_background_color") ) : ?>

                .blog .ut-blog-grid-article .date-format,
                .blog .ut-blog-list-article .date-format {
                    background: <?php echo ot_get_option("ut_blog_overview_date_background_color"); ?>;
                    top: 0;
                    left: 0;
                    padding: 20px;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_date_color") ) : ?>

                .blog .ut-blog-grid-article .ut-post-thumbnail .date-format .day,
                .blog .ut-blog-list-article .ut-post-thumbnail .date-format .day {
                    color: <?php echo ot_get_option("ut_blog_overview_date_color"); ?>;    
                }

                <?php

                // single post fallback color
                if( !ot_get_option("ut_global_post_meta_date_color") ) {

                    // no background set but color is not white
                    if( !ot_get_option("ut_global_post_meta_background") && !( ot_get_option("ut_blog_overview_date_color") == '#FFF' || ot_get_option("ut_blog_overview_date_color") == '#FFFFFF' || ( $ut_blog_overview_date_color && $ut_blog_overview_date_color['r'] == 255 && $ut_blog_overview_date_color['g'] == 255 && $ut_blog_overview_date_color['b'] == 255 ) ) ) : ?>

                        .single-post .entry-meta .date-format .day {
                            color: <?php echo ot_get_option("ut_blog_overview_date_color"); ?>;
                        }

                    <?php endif;

			    } ?>

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_date_color", ot_get_option("ut_blog_overview_article_title_color") ) ) : ?>

                <?php $ut_blog_overview_date_color = $this->parse_rgba( ot_get_option("ut_blog_overview_date_color", ot_get_option("ut_blog_overview_article_title_color") ) );

                if( !( ot_get_option("ut_blog_overview_date_color", ot_get_option("ut_blog_overview_article_title_color")) == '#FFF' || ot_get_option("ut_blog_overview_date_color", ot_get_option("ut_blog_overview_article_title_color") ) == '#FFFFFF' || ( $ut_blog_overview_date_color && $ut_blog_overview_date_color['r'] == 255 && $ut_blog_overview_date_color['g'] == 255 && $ut_blog_overview_date_color['b'] == 255 ) ) ) : ?>

                    .blog .ut-blog-classic-article .entry-meta .date-format .day,
                    .blog .ut-blog-mixed-large-article .entry-meta .date-format .day {
                        color: <?php echo ot_get_option("ut_blog_overview_date_color", ot_get_option("ut_blog_overview_article_title_color") ); ?>;
                    }

                <?php endif; ?>

            <?php endif; ?>

            <?php if( ( is_archive() || is_search() ) && ot_get_option("ut_blog_overview_date_color") && ot_get_option("ut_blog_overview_date_background_color") ) : ?>

                .ut-blog-grid-article .ut-post-thumbnail .date-format .day {
                    color: <?php echo ot_get_option("ut_blog_overview_date_color"); ?>;
                }

            <?php endif; ?>

            <?php if( ( is_archive() || is_search() ) && ot_get_option("ut_blog_overview_date_background_color") ) : ?>

                .ut-blog-grid-article .ut-post-thumbnail .date-format {
                    background: <?php echo ot_get_option("ut_blog_overview_date_background_color"); ?>;
                    top: 0;
                    left: 0;
                    padding: 20px;
                }

            <?php endif; ?>

            <?php echo $this->typography_css('.date-format .day', ot_get_option('ut_blog_overview_date_font_style') ); ?> 
                
            <?php if( ot_get_option("ut_blog_overview_date_color_bottom") ) : ?>

                .blog .ut-blog-grid-article .ut-post-thumbnail .date-format .month,
                .blog .ut-blog-list-article .ut-post-thumbnail .date-format .month {
                    color: <?php echo ot_get_option("ut_blog_overview_date_color_bottom"); ?>;    
                }

                <?php

                // single post fallback color
                if( !ot_get_option("ut_global_post_meta_date_color") ) {

                    // no background set but color is not white
                    if( !ot_get_option("ut_global_post_meta_background") && !( ot_get_option("ut_blog_overview_date_color") == '#FFF' || ot_get_option("ut_blog_overview_date_color") == '#FFFFFF' || ( $ut_blog_overview_date_color && $ut_blog_overview_date_color['r'] == 255 && $ut_blog_overview_date_color['g'] == 255 && $ut_blog_overview_date_color['b'] == 255 ) ) ) : ?>

                        .single-post .entry-meta .date-format .month {
                            color: <?php echo ot_get_option("ut_blog_overview_date_color_bottom"); ?>;
                        }

                    <?php endif;

                } ?>

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color") ) ) : ?>

                <?php

                $ut_blog_overview_date_color_bottom = $this->parse_rgba( ot_get_option("ut_blog_overview_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")) );

                if( !( ot_get_option("ut_blog_overview_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")) == '#FFF' || ot_get_option("ut_blog_overview_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")) == '#FFFFFF' || ( $ut_blog_overview_date_color_bottom && $ut_blog_overview_date_color_bottom['r'] == 255 && $ut_blog_overview_date_color_bottom['g'] == 255 && $ut_blog_overview_date_color_bottom['b'] == 255 ) ) ) : ?>

                    .blog .ut-blog-classic-article .entry-meta .date-format .month,
                    .blog .ut-blog-mixed-large-article .entry-meta .date-format .month {
                        color: <?php echo ot_get_option("ut_blog_overview_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")); ?>;
                    }

                <?php endif; ?>

            <?php endif; ?>

            <?php echo $this->typography_css('.date-format .month', ot_get_option('ut_blog_overview_date_bottom_font_style') ); ?>    
                
            <?php if( ot_get_option( 'ut_blog_date_body_font', 'off' ) == 'on' ) : ?>    
                
                .date-format,
                .date-format .day,
                .date-format .month {
                    font-family: inherit !important; 
                }
                
            <?php endif; ?>    
            
            <?php
            
            /**
             * Blog Date Skins
             */ 
            
            $date_color_skins = ot_get_option("ut_date_color_skins");
            
            if( !empty( $date_color_skins ) && is_array( $date_color_skins ) ) {
                
                foreach( $date_color_skins as $skin ) {

                    if( !empty( $skin["date_color"] ) ) {
                        
                        // blog grid 
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-post-thumbnail .date-format .day { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .day { color: ' . $skin["date_color"] . '; }';
                        
                        //blog list   
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-post-thumbnail:not(.ut-post-thumbnail-empty) .date-format .day { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .day { color: ' . $skin["date_color"] . '; }';
                        
                    }
                    
                    if( !empty( $skin["date_color_bottom"] ) ) {
                        
                        // blog grid 
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-post-thumbnail .date-format .month { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-grid-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .month { color: ' . $skin["date_color"] . '; }';
                        
                        //blog list   
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-post-thumbnail:not(.ut-post-thumbnail-empty) .date-format .month { color: ' . $skin["date_color"] . '; }';
                        echo '.ut-blog-list-article.' . $skin["unique_id"] . ' .ut-format-gallery .date-format .month { color: ' . $skin["date_color"] . '; }';
                        
                    }
                    
                    if( !empty( $skin["caption_color"] ) ) {
                        
                        // blog image caption
                        echo '.' . $skin["unique_id"] . ' .ut-post-thumbnail-caption { color: ' . $skin["caption_color"] . '; }';
                        
                    }
                    
                }
                
            } ?>

            /**
             * Blog
             */

            <?php if( ot_get_option("ut_blog_hide_date", 'off') == 'on' ) : ?>

                .blog .ut-blog-mixed-large-article .date-format,
                .blog .ut-blog-grid .date-format,
                .blog .ut-blog-layout-list .date-format {
                    display: none;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_hide_meta_categories", 'off') == 'on' ) : ?>

                .blog .ut-blog-mixed-large-article .entry-meta .cat-links,
                .blog .ut-blog-grid .entry-meta.entry-meta-top,
                .blog .ut-blog-layout-list .entry-meta.entry-meta-top {
                    display: none;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_hide_meta_comments", 'off') == 'on' ) : ?>

                .blog .ut-blog-grid .entry-meta:not(.entry-meta-top),
                .blog .ut-blog-layout-list .entry-meta:not(.entry-meta-top) {
                    display: none;
                }

            <?php endif; ?>

            <?php

            if( ot_get_option('ut_global_blog_background_image') ) {

                echo $this->css_background( '.blog .main-content-background' , ot_get_option('ut_global_blog_background_image') );

            } ?>


            /**
             * Archive
             */

            <?php if( is_archive() && ot_get_option("ut_blog_archive_hide_date", 'off') == 'on' ) : ?>

                .archive .ut-blog-grid-article .date-format {
                    display: none;
                }

            <?php endif; ?>


            <?php if( is_archive() && ot_get_option("ut_blog_archive_hide_meta_categories", 'off') == 'on' ) : ?>

                .archive .ut-blog-grid-article .entry-meta.entry-meta-top {
                    display: none;
                }

            <?php endif; ?>

            <?php if( is_archive() && ot_get_option("ut_blog_archive_hide_meta_comments", 'off') == 'on' ) : ?>

                .archive .ut-blog-grid-article .entry-meta:not(.entry-meta-top) {
                    display: none;
                }

            <?php endif; ?>


            /**
             * Single Post Colors
             */

            <?php if( ot_get_option("ut_blog_overview_article_title_color", ot_get_option('ut_global_h1_font_color') ) ) : ?>

                .single-post .single-post-entry-title {
                    color: <?php echo ot_get_option("ut_blog_overview_article_title_color", ot_get_option('ut_global_h1_font_color')); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_blog_overview_article_sub_title_color", ot_get_option('ut_global_h1_font_color') ) ) : ?>

                .single-post .single-post-entry-sub-title {
                    color: <?php echo ot_get_option("ut_blog_overview_article_sub_title_color", ot_get_option('ut_global_h1_font_color')); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_meta_date_color", ot_get_option("ut_blog_overview_article_title_color") ) ) : ?>

                .single-post .entry-meta .date-format .day {
                    color: <?php echo ot_get_option("ut_global_post_meta_date_color", ot_get_option("ut_blog_overview_article_title_color")); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_meta_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")) ) : ?>

                .single-post .entry-meta .date-format .month {
                    color: <?php echo ot_get_option("ut_global_post_meta_date_color_bottom", ot_get_option("ut_blog_overview_article_title_color")); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_meta_background") ) : ?>     
                
                .single-post .entry-meta {
                    background: <?php echo ot_get_option("ut_global_post_meta_background"); ?>;
                    padding: 20px;
                    margin-right: 20px;
                }
                
            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_border_color") ) : ?>

                .single-post #comment,
                .single-post #comments,
                .single-post .date-format,
                .single-post .author-info,
                .single-post .comment-list,
                .single-post .comment-body,
                .single-post #commentform input {
                    border-color: <?php echo ot_get_option("ut_global_post_border_color"); ?>;
                }

                .single-post .ut-arrow-left,
                .single-post .ut-arrow-left::after {
                    border-right-color: <?php echo ot_get_option("ut_global_post_border_color"); ?>;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_tags_hash_color") ) : ?>

                .tags-links .fa-hashtag {
                    color: <?php echo ot_get_option("ut_global_post_tags_hash_color"); ?> !important;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_tags_color") ) : ?>

                .tags-links a {
                    color: <?php echo ot_get_option("ut_global_post_tags_color"); ?> !important;
                }

            <?php endif; ?>

            <?php if( ot_get_option("ut_global_post_tags_color_hover") ) : ?>

                .tags-links a:hover,
                .tags-links a:active {
                    color: <?php echo ot_get_option("ut_global_post_tags_color_hover"); ?> !important;
                }

            <?php endif; ?>


                
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}