<?php
/*------------- THEME SETUP START -------------*/
add_action( 'after_setup_theme', 'esport_setup' );
function esport_setup(){
	load_theme_textdomain( 'esport', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'quote', 'gallery', 'image', 'video', 'audio', 'chat', 'link' ) );
	
	if( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'esport-big-post', 870, 450, true );
		add_image_size( 'esport-small-post', 420, 290, true );
		add_image_size( 'esport-slider', 1920, 850, true );
		add_image_size( 'esport-player-avatar', 505, 655, true );
		add_image_size( 'esport-team-logo', 200, 200, true );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
	
	if( ! isset( $content_width ) ) {
		$content_width = 600;
	}
	
	if( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
/*------------- THEME SETUP END -------------*/

/*------------- SCRIPTS AND STYLES FILE START -------------*/
function esport_scripts()
{
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'esport-animate', get_template_directory_uri() . '/assets/js/animate.js', array(), false, true  );
	wp_enqueue_script( 'esport-scrollbar', get_template_directory_uri() . '/assets/js/scrollbar.min.js', array(), false, true  );
	wp_enqueue_script( 'esport-admin-bar', get_template_directory_uri() . '/assets/js/admin-bar.js', array(), false, true  );
	$esport_fixed_sidebar = ot_get_option( 'esport_fixed_sidebar' );
	if( $esport_fixed_sidebar == 'on' or !$esport_fixed_sidebar == 'off' ) {
		wp_enqueue_script( 'esport-fixed-sidebar', get_template_directory_uri() . '/assets/js/fixed-sidebar.js', array(), false, true  );
	}
	$header_fixed = ot_get_option( 'header_fixed' );
	if( $header_fixed == 'on' ) {
		wp_enqueue_script( 'esport-fixed-header', get_template_directory_uri() . '/assets/js/fixed-header.js', array(), false, true  );
	}
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array(), false, true  );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), false, true  );
	wp_enqueue_script( 'counter', get_template_directory_uri() . '/assets/js/counter.js', array(), false, true  );
	wp_enqueue_script( 'esport', get_template_directory_uri() . '/assets/js/esport.js', array(), false, true  );
	if( ot_get_option('custom_js') !== "" ) {
		wp_add_inline_script( "esport", "jQuery(document).ready(function($){" . ot_get_option('custom_js') . "});" );
	}
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/countdown.min.js', array(), false, true  );
	wp_enqueue_script( 'plyr-io', get_template_directory_uri() . '/assets/js/plyr.js', array(), false, true  );
	wp_enqueue_script( 'select-classie', get_template_directory_uri() . '/assets/js/select-classie.js', array(), false, true  );
	wp_enqueue_script( 'select-fx', get_template_directory_uri() . '/assets/js/select-fx.js', array(), false, true  );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css'  );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css'  );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css'  );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri() . '/assets/css/scrollbar.css'  );
	wp_enqueue_style( 'select', get_template_directory_uri() . '/assets/css/select.css'  );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css'  );
	wp_enqueue_style( 'plyr-io', get_template_directory_uri() . '/assets/css/plyr.css'  );
	wp_enqueue_style( 'esport', get_stylesheet_uri() );
	if( ot_get_option('custom_css') !== "" ) {
		wp_add_inline_style( 'esport', ot_get_option('custom_css') );		
	}
}
add_action( 'wp_enqueue_scripts', 'esport_scripts' );

function esport_load_custom_wp_admin() {
	wp_enqueue_style( 'ot-admin-css', get_template_directory_uri() . '/admin/assets/css/ot-admin.css', false, '1.0' );
	wp_enqueue_style( 'esport-admin', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0' );
	wp_enqueue_script( 'esport-admin-script', get_template_directory_uri() . '/assets/js/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'esport_load_custom_wp_admin' );
/*------------- SCRIPTS AND STYLES FILE END -------------*/

/*======
*
* Demo Importer
*
======*/
function esport_demo_content() {
	return array(
		array(
			'import_file_name' => esc_html__( 'Import Demo Content', 'esport' ),
			'import_file_url' => get_template_directory_uri() . '/include/demos/demo-content.xml',
			'import_widget_file_url' => get_template_directory_uri() . '/include/demos/widget-content.wie',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'esport_demo_content' );

/*------------- BODY CLASS START -------------*/
function esport_class_names( $classes ) {
	$classes[] = 'esport-class';
	
	$woocommerce_shop_product_column = esc_attr( ot_get_option( 'woocommerce_shop_product_column' ) );
	if( !empty( $woocommerce_shop_product_column ) ) {
		$classes[] = ' esport-shop-column-' . $woocommerce_shop_product_column;
	}
	
	return $classes;
}
add_filter( 'body_class', 'esport_class_names' );
/*------------- BODY CLASS END -------------*/

/*------------- EXCERPT START -------------*/
function esport_new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'esport_new_excerpt_more' );

function esport_my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'esport_my_add_excerpts_to_pages' );

function esport_text_limit_words( $string, $word_limit ) {
	$words = explode( ' ', $string, ( $word_limit + 1 ) );
	if( count( $words ) > $word_limit ) {
		array_pop( $words );
	}
	return implode( ' ', $words );
}
/*------------- EXCERPT END -------------*/

/*------------- AUTHOR BOX START -------------*/
function esport_post_author() {
	$author = get_the_author();
	$author_description = get_the_author_meta( 'description' );
	$author_url = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 120 ) );
	if ( $author_description ) { ?>
		<div class="post-author">
			<?php esport_content_title_start( $text = esc_html__ ( "About The Author", "esport" ) ); ?>
			<aside class="about-author">
				<?php if ( $author_avatar ) : ?>
					<div class="about-image">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 170 ) ); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="about-content">
					<div class="author-name">
						<a href="<?php echo esc_url( $author_url ); ?>" rel="author">
							<?php printf( esc_html__( '%s', 'esport' ), $author ); ?>
						</a>
					</div>
					<?php esport_user_profile_social_media_links(); ?>
					<p><?php echo esc_attr( $author_description ); ?></p>
				</div>
			</aside>
		</div>
	<?php }
}
/*------------- AUTHOR BOX END -------------*/

/*------------- PAGE LOADING START -------------*/
function esport_page_loading() {
	$esport_loader = ot_get_option( 'esport_loader' );
	if( $esport_loader == 'on' ) :
		echo '<div class="loader-wrapper"><div class="spinner">
				  <div class="double-bounce1"></div>
				  <div class="double-bounce2"></div>
				</div>
			</div>';
	endif;
}
/*------------- PAGE LOADING END -------------*/

/*------------- FOOTER CONTENT START -------------*/
function esport_footer() {
	$hide_footer = ot_get_option( 'hide_footer' );
	$default_footer_style = ot_get_option( 'default_footer_style' );
	$page_footer_style_1 = ot_get_option( 'page_footer_style_1' );
	$page_footer_style_2 = ot_get_option( 'page_footer_style_2' );
	
	if( !$hide_footer == 'off' or $hide_footer == 'on' ) {
		if ( is_page() or is_single() ) {
			global $post;
			$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			$footer_style = get_post_meta( $post->ID, 'footer_layout_select', true);
			$footer_status = get_post_meta( $post->ID, 'footer_status', true);
		}
		else {
			$post = "";
			$footer_gap = "";
			$footer_style = "";
			$footer_status = "";
		}

		if( !$footer_gap == 'off' or $footer_gap == "on" ) {
			$footer_gap_status = "remove-gap";
		} else {
			$footer_gap_status = "remove-gap-removed";			
		}

		function esport_copyright( $extra_class = "" ) {
			$hide_footer_copyright_menu = ot_get_option( 'hide_footer_copyright_menu' );
			$footer_copyright_text = ot_get_option( 'footer_copyright_text' );
			if( !empty( $footer_copyright_text ) or !$hide_footer_copyright_menu == 'off' or $hide_footer_copyright_menu == "on" ) {
				echo '<div class="footer-copyright ' . esc_attr( $extra_class ) . '">';
					echo '<div class="container">';
						if( !empty( $footer_copyright_text ) ) {
							echo '<p>' . esc_attr( $footer_copyright_text ) . '</p>';
						}

						if( !$hide_footer_copyright_menu == 'off' or $hide_footer_copyright_menu == "on" ) {
							wp_nav_menu(
								array(
									'menu' => 'footermenu',
									'theme_location' => 'footermenu',
									'depth' => 1,
									'container' => 'div',
									'fallback_cb' => 'esport_walker::fallback',
									'walker' => new esport_walker()
								)
							);
						}
					echo '</div>';
				echo '</div>';
			}
		}
		
		function esport_footerstyle1() {
			$page_footer_style_1 = ot_get_option( 'page_footer_style_1' );
			if ( is_page() or is_single() ) {
				global $post;
				$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			}
			else {
				$post = "";
				$footer_gap = "";
			}

			if( !$footer_gap == 'off' or $footer_gap == "on" ) {
				$footer_gap_status = "remove-gap";
			} else {
				$footer_gap_status = "remove-gap-removed";			
			}
			?>
				<footer class="footer footer-style1 <?php echo esc_attr( $footer_gap_status ); ?>" id="Footer">
					<?php esport_container_before(); ?>
						<div class="footer-content">
							<?php
								$args_footer_page_content = array(
									'p' => $page_footer_style_1,
									'ignore_sticky_posts' => true,
									'post_type' => 'page',
									'post_status' => 'publish'
								);
								$wp_query = new WP_Query( $args_footer_page_content );
								while ( $wp_query->have_posts() ) :
								$wp_query->the_post();
								$postid = get_the_ID();
							?>
								<?php echo do_shortcode( get_the_content() ); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php esport_container_after(); ?>
				</footer>
				<?php esport_copyright(); ?>
			<?php
		}
		
		function esport_footerstyle2() {
			$page_footer_style_2 = ot_get_option( 'page_footer_style_2' );
			if ( is_page() or is_single() ) {
				global $post;
				$footer_gap = get_post_meta( $post->ID, 'footer_gap', true);
			}
			else {
				$post = "";
				$footer_gap = "";
			}

			if( !$footer_gap == 'off' or $footer_gap == "on" ) {
				$footer_gap_status = "remove-gap";
			} else {
				$footer_gap_status = "remove-gap-removed";			
			}
			?>
				<footer class="footer footer-style2 <?php echo esc_attr( $footer_gap_status ); ?>" id="Footer">
					<?php esport_container_before(); ?>
						<div class="footer-content">
							<?php
								$args_footer_page_content = array(
									'p' => $page_footer_style_2,
									'ignore_sticky_posts' => true,
									'post_type' => 'page',
									'post_status' => 'publish'
								);
								$wp_query = new WP_Query( $args_footer_page_content );
								while ( $wp_query->have_posts() ) :
								$wp_query->the_post();
								$postid = get_the_ID();
							?>
								<?php echo do_shortcode( get_the_content() ); ?>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php esport_container_after(); ?>
				</footer>
				<?php esport_copyright( $extra_class = "style2" ); ?>
			<?php
		}
		
		if( !$footer_status == 'off' or $footer_status == "on" ) {
		
			if( !$page_footer_style_1 == '0' and !empty( $page_footer_style_1  ) or !$page_footer_style_2 == '0' and !empty( $page_footer_style_2  ) ) {
				
				if ( is_page() or is_single() ) {
					
					if( $footer_style == "footer-style-2" ) {
						esport_footerstyle2();
					} elseif( $footer_style == "footer-style-1" ) {
						esport_footerstyle1();
					} else {
						
						if( $default_footer_style == "footer-style-2" ) {
							esport_footerstyle2();
						} else {
							esport_footerstyle1();
						}
						
					}
					
				} elseif( is_category() ) {
				
					$cat = get_queried_object();
					$cat_id = $cat->term_id;
					$esport_category_footer_style = get_term_meta( $cat_id, 'esport_category_footer_style', true );
					
					if( $esport_category_footer_style == "footer-style-2" ) {
						esport_footerstyle2();
					} elseif( $esport_category_footer_style == "footer-style-1" ) {
						esport_footerstyle1();
					} else {
						
						if( $default_footer_style == "footer-style-2" ) {
							esport_footerstyle2();
						} else {
							esport_footerstyle1();
						}
						
					}
					
				} else {
					
					if( $default_footer_style == "footer-style-2" ) {
						esport_footerstyle2();
					} else {
						esport_footerstyle1();
					}
					
				}
			
			} else {
				echo '<div class="no-footer-blank"></div>';
			}
		} else {
			echo '<div class="no-footer-blank"></div>';
		}
		
	} else {
		echo '<div class="no-footer-blank"></div>';
	}
}
/*------------- FOOTER CONTENT END -------------*/

/*------------- DATE FORMAT START -------------*/
function esport_global_date_format( $date = "" ) {
	$date = date_i18n( get_option( 'date_format' ), strtotime( $date ) );
	return $date;
}

function esport_global_date_format_no_year( $date = "" ) {
	$date = date_i18n( 'M d, Y', strtotime( $date ) );
	return $date;
}
/*------------- DATE FORMAT END -------------*/

/*------------- POST FEATURED HEADER START -------------*/
function esport_post_featured_header( $post_id = "" ) {
	$featured_header_status = get_post_meta( $post_id, 'featured_header_status', true );
	$post_gallery_images_control =  get_post_meta( $post_id, 'post_images', true );

	if( $featured_header_status == "on" or !$featured_header_status == "off" ) {
		if ( has_post_format( 'video' ) ) {
			$post_video_embed = get_post_meta( $post_id, 'post_video_embed', true );
			if( !empty( $post_video_embed ) ) {
				$post_video_embed_new = stripcslashes( $post_video_embed );
				echo '<div class="post-featured-header">';
					echo stripslashes( addslashes( $post_video_embed_new ) );

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
				echo '</div>';
			}
		} elseif( has_post_format( 'audio' ) ) {
			$post_audio_embed = get_post_meta( $post_id, 'post_audio_embed', true );
			if( !empty( $post_audio_embed ) ) {
				$post_audio_embed_new = stripcslashes( $post_audio_embed );
				echo '<div class="post-featured-header">';
					echo stripslashes( addslashes( $post_audio_embed_new ) );

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
				echo '</div>';
			}
		} elseif( has_post_format( 'gallery' ) and !empty( $post_gallery_images_control ) ) {
			$post_gallery_images =  explode( ',', get_post_meta( $post_id, 'post_images', true ) );
			if( !empty( $post_gallery_images ) ) {
				echo '<div class="post-featured-header">';
					echo '<div class="swiper-container post-featured-header-image-gallery">';
						echo '<div class="swiper-wrapper">';
							foreach ($post_gallery_images as $image) {
								echo '<div class="swiper-slide">' . wp_get_attachment_image( $image, 'esport-big-post', true, true ) . '</div>';
							}
						echo '</div>';
					echo '</div>';

					$post_post_category_name = ot_get_option( 'post_post_category_name' );
					if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
						echo '<div class="category">';
							the_category( '', '' );
						echo '</div>';
					}
					echo '<div class="swiper-button-next"></div>';
					echo '<div class="swiper-button-prev"></div>';
				echo '</div>';
			}
		} else {
			$post_post_image = ot_get_option( 'post_post_image' );
			if ( !$post_post_image == 'off' or $post_post_image == 'on' ) {
				if ( has_post_thumbnail() ) {
					echo '<div class="post-featured-header">';
						echo get_the_post_thumbnail( $post_id, 'esport-big-post' );

						$post_post_category_name = ot_get_option( 'post_post_category_name' );
						if ( !$post_post_category_name == 'off' or $post_post_category_name == 'on' ) {
							if( is_single() ) {
								echo '<div class="category">';
									the_category( '', '' );
								echo '</div>';
							}
						}
					echo '</div>';
				}
			}
		}
	}
}
/*------------- POST FEATURED HEADER END -------------*/

/*------------- ATTACHMENT ID START -------------*/
if( ! function_exists( 'esport_get_attachment_id_from_guid' ) ) {
	function esport_get_attachment_id_from_guid( $url ) {
		$attachment_id = 0;
		$dir = wp_upload_dir();
		if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
			$file = basename( $url );
			$query_args = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'fields'      => 'ids',
				'meta_query'  => array(
					array(
						'value'   => $file,
						'compare' => 'LIKE',
						'key'     => '_wp_attachment_metadata',
					),
				)
			);
			$query = new WP_Query( $query_args );
			if ( $query->have_posts() ) {
				foreach ( $query->posts as $post_id ) {
					$meta = wp_get_attachment_metadata( $post_id );
					$original_file       = basename( $meta['file'] );
					$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
					if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
						$attachment_id = $post_id;
						break;
					}
				}
			}
		}
		return $attachment_id;
	}
}
/*------------- ATTACHMENT ID START -------------*/

/*------------- GENERAL TO SLUG START -------------*/
function esport_to_slug( $string ){
	return strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', $string ) ) );
}
/*------------- GENERAL TO SLUG END -------------*/

/*------------- RELATED POSTS START -------------*/
function esport_post_related_navigation() {
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	$post_related_posts = ot_get_option( 'post_related_posts' );
	$post_post_navigation = ot_get_option( 'post_post_navigation' );

	$post_related_count = ot_get_option( 'post_related_posts_column' );
	if( !empty( $post_related_count ) ) {
		$post_related_count = $post_related_count;
	} else {
		$post_related_count = "3";
	}
	
	if( !$post_related_posts == 'off' or $post_related_posts == 'on' or !$post_post_navigation == 'off' or $post_post_navigation == 'on' ) {
		echo '<div class="post-related-navigation">';
			if( !$post_related_posts == 'off' or $post_related_posts == 'on' ) {
				if ( $tags ) {
				?>
					<?php esport_content_title_start( $text = esc_html__ ( "Related Posts", "esport" ) ); ?>
					<div class="related-posts-columns related-posts-column-<?php echo esc_attr( $post_related_count ); ?>">
						<?php
							$tag_ids = array();
							foreach( $tags as $individual_tag ) $tag_ids[] = $individual_tag->term_id;
							$args = array(
								'tag__in' => $tag_ids,
								'post__not_in' => array( $post->ID ),
								'post_status' => 'publish',
								'posts_type' => 'post',
								'ignore_sticky_posts' => true,
								'posts_per_page' => $post_related_count
							);
							$my_query = new wp_query( $args );
							while( $my_query->have_posts() ) {
								$my_query->the_post();
								echo esport_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = "false", $excerpt = "false", $read_more = "false", $post_info = "true" );
							}
							wp_reset_postdata();
						?>
					</div>
				<?php }
			}

			if ( !$post_post_navigation == 'off' or $post_post_navigation == 'on' ) {
				esport_post_navigation(); 
			}
		echo '</div>';
	}
}
/*------------- RELATED POSTS END -------------*/

/*------------- PAGINATION START -------------*/
function esport_pagination() {
	if( is_singular() )
		return;

	global $wp_query;

	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	if( $paged >= 1 )
		$links[] = $paged;

	if( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	$esport_post_navigation_prev = '<span>' . esc_html__( 'Previous', 'esport' ) . '</span>';
	$esport_post_navigation_next = '<span>' . esc_html__( 'Next', 'esport' ) . '</span>';
	$prev_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>' . $esport_post_navigation_prev;
	$next_text = $esport_post_navigation_next . '<i class="fa fa-angle-right" aria-hidden="true"></i>';

	echo '<nav class="post-pagination"><ul>' . "\n";

	if( get_previous_posts_link() )
		printf( '<li>' . get_previous_posts_link( $prev_text ) . '</li>' );

	?>
		<li class="total-pages"><span><?php echo esc_html__( 'Page', 'esport' ) . ' ' . $paged . ' ' . esc_html__( 'of', 'esport' ) . ' ' . $max; ?></span></li>
	<?php
	if( get_next_posts_link() )
		printf( '<li>' . get_next_posts_link( $next_text ) . '</li>' );

	echo '</ul></nav>' . "\n";
}
/*------------- PAGINATION END -------------*/

/*------------- PLAYER TEMPLATE START -------------*/
function esport_player_template( $post_id = "" ) {
	$output = '<div class="player-wrapper">';
		if ( has_post_thumbnail() ) {
			$bg_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'esport-player-avatar' );
		} else {
			$bg_url = "";
		}
		
		$player_username = get_post_meta( $post_id, "player_username", true );
		$team_profession = get_post_meta( $post_id, "team_profession", true );
		$output .= '<div class="image" style="background-image:url(' . esc_url( $bg_url[0] ) . ');" >';
			$output .= '<div class="content">';
				if( !empty( $player_username ) ) {
					$output .= '<div class="username">' . esc_attr( $player_username ) . '</div>';
				}
				if( !empty( $team_profession ) ) {
					$output .= '<div class="username">' . esc_attr( $team_profession ) . '</div>';
				}

				$title_control = get_the_title();
				if( !empty( $title_control ) ) {
					$output .= '<div class="name">' . get_the_title( $post_id ) . '</div>';
				}
			$output .= '</div>';
			$output .= '<div class="hover-content">';
				$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0) ) . '"><div class="view-profile"><span>' . esc_html__( 'View Profile', 'esport' ) . '</span></div></a>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';
	return $output;
}
/*------------- PLAYER TEMPLATE END -------------*/

/*------------- POST NAVIGATION START -------------*/
function esport_post_navigation() {
	$esport_post_navigation_prev = '<span>' . esc_html__( 'Previous', 'esport' ) . '</span>';
	$esport_post_navigation_next = '<span>' . esc_html__( 'Next', 'esport' ) . '</span>';
	$prevPost = get_previous_post( false );
	$nextPost = get_next_post( false );
?>
	<div class="post-navigation">
		<nav>
			<ul>
				<?php if( !empty( $prevPost ) ) { ?>
					<li class="previous">
						<?php previous_post_link( '%link', '<i class="fa fa-angle-left" aria-hidden="true"></i>' . $esport_post_navigation_prev ); ?>
					</li>
				<?php } ?>
				<?php if( !empty( $nextPost ) ) { ?>
					<li class="next">
						<?php next_post_link( '%link', $esport_post_navigation_next . '<i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?>
					</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
<?php
}

function esport_latest_posts_pagination( $paged = "", $query = "" ) {
	if( !empty( $paged ) or !empty( $query ) ) {
		$output = "";
		$esport_post_navigation_prev = '<span>' . esc_html__( 'Previous Posts', 'esport' ) . '</span>';
		$esport_post_navigation_next = '<span>' . esc_html__( 'Next Posts', 'esport' ) . '</span>';	
		$prev_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>' . $esport_post_navigation_prev;
		$next_text = $esport_post_navigation_next . '<i class="fa fa-angle-right" aria-hidden="true"></i>';
		$output .= '<nav class="post-pagination">';
			$output .= '<ul>';
				$prev_post_control = get_previous_posts_link( $prev_text );
				if( !empty( $prev_post_control ) ) {
					$output .= '<li class="previous">' . get_previous_posts_link( $prev_text ) . '</li>';					
				}

				$next_post_control = get_next_posts_link( $next_text, $query->max_num_pages );
				if( !empty( $next_post_control ) ) {
					$output .= '<li class="next">' . get_next_posts_link( $next_text, $query->max_num_pages ) . '</li>';
				}
			$output.= '</ul>';
		$output .= '</nav>';
		return $output;
	}
}
/*------------- POST NAVIGATION END -------------*/

/*------------- CONTACT FORM 7 START -------------*/
function esport_mycustom_wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );
	return $form;
}
add_filter( 'wpcf7_form_elements', 'esport_mycustom_wpcf7_form_elements' );
/*------------- CONTACT FORM 7 END -------------*/

/*------------- HEADER START -------------*/
	/*------------- HEADER STYLES START -------------*/
	function esport_header() {
		$hide_header = ot_get_option( 'hide_header' );
		$default_header_style = ot_get_option( 'default_header_style' );
		
		if( !$hide_header == 'off' or $hide_header == 'on' ) {
			if ( is_page() or is_single() ) {
				global $post;
				$header_style = get_post_meta( $post->ID, 'header_layout_select', true);
				$header_status = get_post_meta( $post->ID, 'header_status', true);
				$header_gap = get_post_meta( $post->ID, 'header_gap', true);
			}
			else {
				$header_style = "";
				$header_status = "";
				$header_gap = "";
			}

			if( !$header_gap == 'off' or $header_gap == "on" ) {
				$header_gap_status = "remove-gap";
			} else {
				$header_gap_status = "remove-gap-removed";			
			}
			
			function esport_headerstyle1() {
				if ( is_page() or is_single() ) {
					global $post;
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			?>
				<div class="header header-style-1<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php esport_site_logo(); ?>
							<div class="header-elements">
								<?php esport_header_styles_main_elements(); ?>
							</div>
							<div class="header-menu">
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => 'mainmenu',
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'esport_walker::fallback',
												'walker' => new esport_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function esport_headerstyle2() {
				if ( is_page() or is_single() ) {
					global $post;
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			?>
				<div class="header header-style-1 header-style-2<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php esport_site_logo(); ?>
							<?php esport_site_alternative_logo(); ?>
							<div class="header-elements">
								<?php esport_header_styles_main_elements(); ?>
							</div>
							<div class="header-menu">
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => 'mainmenu',
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'esport_walker::fallback',
												'walker' => new esport_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function esport_headerstyle3() {
				if ( is_page() or is_single() ) {
					global $post;
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			?>
				<div class="header header-style-1 header-style-3<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php esport_site_logo(); ?>
							<div class="header-elements">
								<?php esport_header_styles_main_elements(); ?>
							</div>
							<div class="header-menu">
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => 'mainmenu',
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'esport_walker::fallback',
												'walker' => new esport_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			function esport_headerstyle4() {
				if ( is_page() or is_single() ) {
					global $post;
					$header_gap = get_post_meta( $post->ID, 'header_gap', true);
				}
				else {
					$header_gap = "";
				}

				if( !$header_gap == 'off' or $header_gap == "on" ) {
					$header_gap_status = "remove-gap";
				} else {
					$header_gap_status = "remove-gap-removed";			
				}
			?>
				<div class="header header-style-1 header-style-4<?php echo ' ' . esc_attr( $header_gap_status ); ?>">
					<div class="container">
						<div class="header-main-area">
							<?php esport_site_logo(); ?>
							<div class="header-elements">
								<?php esport_header_styles_main_elements(); ?>
							</div>
							<div class="header-menu">
								<nav class="navbar">
									<?php
										wp_nav_menu(
											array(
												'menu' => 'mainmenu',
												'theme_location' => 'mainmenu',
												'depth' => 5,
												'container' => 'div',
												'container_class' => 'collapse navbar-collapse',
												'menu_class' => 'nav navbar-nav',
												'fallback_cb' => 'esport_walker::fallback',
												'walker' => new esport_walker()
											)
										);
									?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
			
			if( !$header_status == 'off' or $header_status == "on" ) {
				
				if ( is_page() or is_single() ) {
					
					if( $header_style == "header-style-2" ) {
						esport_headerstyle2();
					} elseif( $header_style == "header-style-1" ) {
						esport_headerstyle1();
					} else {
						
						if( $default_header_style == "header-style-2" ) {
							esport_headerstyle2();
						} else {
							esport_headerstyle1();
						}
						
					}
					
				} elseif( is_category() ) {
					
					$cat = get_queried_object();
					$cat_id = $cat->term_id;
					$esport_category_header_style = get_term_meta( $cat_id, 'esport_category_header_style', true );
					
					if( $esport_category_header_style == "header-style-2" ) {
						esport_headerstyle2();
					} elseif( $esport_category_header_style == "header-style-1" ) {
						esport_headerstyle1();
					} else {
						
						if( $default_header_style == "header-style-2" ) {
							esport_headerstyle2();
						} else {
							esport_headerstyle1();
						}
						
					}
					
				} else {
				
					if( $default_header_style == "header-style-2" ) {
						esport_headerstyle2();
					} else {
						esport_headerstyle1();
					}

				}
				
			}
		}
	}
	/*------------- HEADER STYLES START END -------------*/

	/*------------- HEADER MOBILE START -------------*/
	function esport_mobile_header() {
		?>
			<header class="mobile-header">
				<div class="logo-area">
					<div class="container">
						<?php esport_site_logo(); ?>
						<div class="mobile-menu-icon">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</header>
			<div class="mobile-menu-wrapper"></div>
			<div class="mobile-menu scrollbar-outer">
				<div class="mobile-menu-top">
					<div class="logo-area">
						<?php esport_site_logo(); ?>
						<div class="mobile-menu-icon">
							<i class="fa fa-times-thin" aria-hidden="true"></i>
						</div>
					</div>
					<nav class="mobile-navbar">
						<?php
							wp_nav_menu(
								array(
									'menu' => 'mainmenu',
									'theme_location' => 'mainmenu',
									'depth' => 5,
									'container' => 'div',
									'container_class' => 'collapse navbar-collapse',
									'menu_class' => 'nav navbar-nav',
									'fallback_cb' => 'esport_walker::fallback',
									'walker' => new esport_walker()
								)
							);
						?>
					</nav>
				</div>
				<div class="mobile-menu-bottom">
					<?php esport_header_styles_main_elements(); ?>
				</div>
			</div>
		<?php
	}
	/*------------- HEADER MOBILE END -------------*/

	/*------------- HEADER MENUS START -------------*/
	register_nav_menus( 
		array(
			'mainmenu' => esc_html__( 'Main Menu', 'esport' ),
			'footermenu' => esc_html__( 'Copyright Menu', 'esport' ),
		)
	);
	/*------------- HEADER MENUS END -------------*/

	/*------------- HEADER LOGOS START -------------*/
	function esport_site_logo() {
		echo '<div class="header-logo">';
			$logo = ot_get_option( 'esport_logo' );
			$logo_height = ot_get_option( 'logo_height' ); if( !empty( $logo_height ) ) { $logo_height = 'height="' . esc_attr( $logo_height[0] ) . esc_attr( $logo_height[1] ) . '"'; }
			$logo_width = ot_get_option( 'logo_width' ); if( !empty( $logo_width ) ) { $logo_width = 'width="' . esc_attr( $logo_width[0] ) . esc_attr( $logo_width[1] ) . '"'; }
			if( !$logo == ""  ) {
				echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'esport' ) . '" src="' . esc_url( ot_get_option( 'esport_logo' ) ) . '" ' . $logo_height . $logo_width . ' /></a></div>';
			} else {
				echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'esport' ) . '" src="' . get_template_directory_uri() . '/assets/img/logo.png" /></a></div>';
			}
		echo '</div>';
	}

	function esport_site_alternative_logo() {
		echo '<div class="header-logo header-alternative-logo">';
			$logo = ot_get_option( 'esport_logo_alternative' );
			$logo_height = ot_get_option( 'logo_height' ); if( !empty( $logo_height ) ) { $logo_height = 'height="' . esc_attr( $logo_height[0] ) . esc_attr( $logo_height[1] ) . '"'; }
			$logo_width = ot_get_option( 'logo_width' ); if( !empty( $logo_width ) ) { $logo_width = 'width="' . esc_attr( $logo_width[0] ) . esc_attr( $logo_width[1] ) . '"'; }
			if( !$logo == ""  ) {
				echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'esport' ) . '" src="' . esc_url( ot_get_option( 'esport_logo_alternative' ) ) . '" ' . $logo_height . $logo_width . ' /></a></div>';
			} else {
				echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo"><img alt="' . esc_html__( 'Logo', 'esport' ) . '" src="' . get_template_directory_uri() . '/assets/img/logo-alternative.png" /></a></div>';
			}
		echo '</div>';
	}
	/*------------- HEADER LOGOS END -------------*/

	/*------------- HEADER MAIN ELEMENTS START -------------*/
	function esport_header_styles_main_elements() {
		$header_social_media = ot_get_option( 'header_social_media' );
		if( $header_social_media == 'on' or !$header_social_media == 'off' ) {
			echo esport_social_media_links();			
		}
		$header_search = ot_get_option( 'header_search' );
		$rand = rand( 0, 999999 );
		if( $header_search == 'on' or !$header_search == 'off' ) {
			echo '<div class="header-search">
				<div class="header-search-content-wrapper">
					<i class="fa fa-search"></i>
					<div class="header-search-content">
						<form role="search" method="get" id="esportsearchform-' . esc_attr( $rand ) . '" class="searchform" action="' . esc_url( home_url( '/' ) ) . '">
							<div class="search-form-widget">
								<input type="text" value="' . esc_attr( get_search_query() ) . '" placeholder="' . esc_html__( 'Search', 'esport' ) . '" name="s" id="esport-search-form-' . esc_attr( $rand ) . '" class="searchform-text" />
								<button><i class="fa fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
			</div>';
		}
	}
	/*------------- HEADER MAIN ELEMENTS END -------------*/

	/*------------- SUB MENU CLASS START -------------*/
	class esport_walker extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_lvl()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param int $depth Depth of page. Used for padding.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
		}
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			//Add class and attribute to LI element that contains a submenu UL.
			if ($args->has_children){
				$classes[] 		= 'dropdown';
				$li_attributes .= ' data-dropdown="dropdown"';
			}
			$classes[] = 'menu-item-' . $item->ID;
			//If we are on the current page, add the active class to that menu item.
			$classes[] = ($item->current) ? 'active' : '';

			//Make sure you still add all of the WordPress classes.
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

			//Add attributes to link element.
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ($args->has_children) ? ' class="dropdown-toggle disabled" data-toggle="dropdown"' : ''; 

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before;
				$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
			$item_output .= ($args->has_children) ? '<i class="fa fa-angle-down" aria-hidden="true"></i>' : '';
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth.
		 *
		 * This method shouldn't be called directly, use the walk() method instead.
		 *
		 * @see Walker::start_el()
		 * @since 2.5.0
		 *
		 * @param object $element Data object
		 * @param array $children_elements List of elements to continue traversing.
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args
		 * @param string $output Passed by reference. Used to append additional content.
		 * @return null Null on failure with no changes to parameters.
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
	        if ( ! $element )
	            return;
	        $id_field = $this->db_fields['id'];
	        // Display this element.
	        if ( is_object( $args[0] ) )
	           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
	        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	    }
	}
	/*------------- SUB MENU CLASS END -------------*/

	/*------------- HEADER USERBOX CONTENT START -------------*/
	function esport_userbox() {
		$header_user_box = ot_get_option( 'header_user_box' );
		$header_social_login_system = ot_get_option( 'header_social_login_system' );
		if( !$header_user_box == 'off' or $header_user_box == 'on' ) {
			if( ! is_user_logged_in() ){ 
				?>
				<div class="modal fade pt-user-modal" id="user_login_popup" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="user-box">
								<div class="user-box-login">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
									<div class="pt-login">
										<form id="pt_login_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
											<div class="form-group">
												<input class="required" name="pt_user_login" type="text" placeholder="<?php echo esc_html__('Username', 'esport') ?>" />
											</div>
											<div class="form-group">
												<input class="required" name="pt_user_pass" id="pt_user_pass" type="password" placeholder="<?php echo esc_html__('Password', 'esport')?>" />
											</div>
											<div class="form-group login-form-remember-me">
												<div class="login-remember-me-wrapper">
													<input type="checkbox" value="None" id="login-remember-me-wrapper-input" name="pt_remember_me" />
													<label for="login-remember-me-wrapper-input" id="login-remember-me-wrapper-label"><?php echo esc_html__('Remember Me', 'esport')?></label>
												</div>
											</div>
											<div class="form-group login-form-button">
												<input type="hidden" name="action" value="esport_login_member"/>
												<button data-loading-text="<?php echo esc_html__('Loading...', 'esport') ?>" type="submit"><?php echo esc_html__('Sign in', 'esport'); ?></button>
											</div>
											<div class="bottom-links">
											<a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>"><?php echo esc_html__('Lost Password?', 'esport') ?></a>
											<a href="" data-target="#user_register_popup" data-toggle="modal" class="create-an-account" data-dismiss="modal"><?php echo esc_html__('Create an Account', 'esport') ?></a>
											</div>
											<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
										</form>
										<div class="pt-errors"></div>
									</div>
									<div class="pt-loading">
										<p><i class="fa fa-refresh fa-spin"></i><br><?php echo esc_html__('Loading...', 'esport') ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade pt-user-modal" id="user_register_popup" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="user-box">
								<div class="user-box-login">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
									<div class="pt-register">
										<?php
											if( get_option("users_can_register") == "0" ) {
												echo '<p class="users_can_register">' . esc_html__( 'New membership are not allowed.', 'esport' ) . '</p>';
											} else {
										?>
										<form id="pt_registration_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="POST">
											<div class="form-group">
												<input class="required" name="pt_user_login" placeholder="<?php echo esc_html__('Username', 'esport'); ?>" type="text"/>
											</div>
											<div class="form-group">
												<input class="required" name="pt_user_email" id="pt_user_email" placeholder="<?php echo esc_html__('Email', 'esport'); ?>" type="email"/>
											</div>
											<div class="form-group login-form-remember-me">
												<div class="login-remember-me-wrapper">
													<div class="description">
														<?php
															$page_terms_and_conditions = ot_get_option( 'page_terms_and_conditions' );
															if( !empty( $page_terms_and_conditions ) ) {
																$page_terms_and_conditions = get_the_permalink( $page_terms_and_conditions );
															} else {
																$page_terms_and_conditions = home_url( '/' );
															}

															$page_privacy_policy = ot_get_option( 'page_privacy_policy' );
															if( !empty( $page_privacy_policy ) ) {
																$page_privacy_policy = get_the_permalink( $page_privacy_policy );
															} else {
																$page_privacy_policy = home_url( '/' );
															}
														?>
														<?php echo esc_html__('By creating an account you agree to our', 'esport' ); ?>
														<a href="<?php echo esc_url( $page_terms_and_conditions ); ?>" target="_blank"><?php echo esc_html__('terms and conditions', 'esport' ); ?></a>
														<?php echo esc_html__('and our', 'esport' ); ?>
														<a href="<?php echo esc_url( $page_privacy_policy ); ?>" target="_blank"><?php echo esc_html__('privacy policy.', 'esport' ); ?></a>
													</div>
												</div>
											</div>
											<div class="form-group login-form-button register-form-button">
												<input type="hidden" name="action" value="esport_register_member"/>
												<button data-loading-text="<?php echo esc_html__('Loading...', 'esport') ?>" type="submit"><?php echo esc_html__('Be Member', 'esport'); ?></button>
											</div>
											<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
										</form>
										<div class="pt-errors"></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
		}
	}
	add_action( 'wp_footer', 'esport_userbox' );

	function esport_login_member(){
		$user_login = $_POST['pt_user_login'];	
		$user_pass = $_POST['pt_user_pass'];
		$remember = $_POST['pt_remember_me'];
		if(isset($_POST['pt_remember_me'])) {
			$remember_me = "true";
		} else {
			$remember_me = "false";
		}

		if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__('Session token has expired, please reload the page and try again.', 'esport') . '</div>' ) );
		}
		elseif( empty( $user_login ) || empty( $user_pass ) ){
			echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__('Please fill all form fields.', 'esport' ) . '</div>' ) );
		} else {
			$user = wp_signon( array( 'user_login' => $user_login, 'user_password' => $user_pass, 'remember' => $remember_me ), false );
			if( is_wp_error( $user ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . $user->get_error_message() . '</div>' ) );
			} else{
				echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__('Login successful, you are being redirected.', 'esport') . '</div>' ) );
			}
		}
		die();
	}
	add_action( 'wp_ajax_nopriv_esport_login_member', 'esport_login_member' );

	function esport_register_member(){
			$user_login	= $_POST['pt_user_login'];	
			$user_email	= $_POST['pt_user_email'];
			
			if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Session token has expired, please reload the page and try again', 'esport' ).'</div>' ) );
				die();
			}
		 	
		 	elseif( empty( $user_login ) || empty( $user_email ) ){
				echo json_encode( array( 'error' => true, 'message' => '<div class="alert-no">' . esc_html__( 'Please fill all form fields', 'esport' ) . '</div>' ) );
				die();
		 	}
			
			$errors = register_new_user($user_login, $user_email);
			if( is_wp_error( $errors ) ){
				$registration_error_messages = $errors->errors;
				$display_errors = '<div class="alert alert-no">';
					foreach( $registration_error_messages as $error ){
						$display_errors .= '<p>' . $error[0] . '</p>';
					}
				$display_errors .= '</div>';
				echo json_encode( array( 'error' => true, 'message' => $display_errors ) );
			} else {
				echo json_encode( array( 'error' => false, 'message' => '<div class="alert-ok">' . esc_html__( 'Registration completed. Please check your e-mail.', 'esport' ) . '</p>' ) );
			}
		 	die();
	}
	add_action( 'wp_ajax_nopriv_esport_register_member', 'esport_register_member' );
	/*------------- HEADER USERBOX CONTENT END -------------*/
/*------------- HEADER END -------------*/

/*------------- SOCIAL MEDIA START -------------*/
	/*------------- SOCIAL MEDIA LINKS TEMPLATE START -------------*/
	function esport_social_media_links() {
		$output = '';
		$output .='<ul class="social-links">';
			if( !ot_get_option( 'social_media_facebook' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_facebook' ) . '" class="facebook" title="' . esc_html__( 'Facebook', 'esport' ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_twitter' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_twitter' ) . '" class="twitter" title="' . esc_html__( 'Twitter', 'esport' ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_googleplus' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_googleplus' ) . '" class="googleplus" title="' . esc_html__( 'Google+', 'esport' ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_instagram' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_instagram' ) . '" class="instagram" title="' . esc_html__( 'Instagram', 'esport' ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_linkedin' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_linkedin' ) . '" class="linkedin" title="' . esc_html__( 'Linkedin', 'esport' ) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vine' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vine' ) . '" class="vine" title="' . esc_html__( 'Vine', 'esport' ) . '" target="_blank"><i class="fa fa-vine"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_youtube' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_youtube' ) . '" class="youtube" title="' . esc_html__( 'YouTube', 'esport' ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_twitch' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_twitch' ) . '" class="twitch" title="' . esc_html__( 'Twitch', 'esport' ) . '" target="_blank"><i class="fa fa-twitch"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_pinterest' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_pinterest' ) . '" class="pinterest" title="' . esc_html__( 'Pinterest', 'esport' ) . '" target="_blank"><i class="fa fa-pinterest"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_behance' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_behance' ) . '" class="behance" title="' . esc_html__( 'Behance', 'esport' ) . '" target="_blank"><i class="fa fa-behance"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_deviantart' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_deviantart' ) . '" class="deviantart" title="' . esc_html__( 'Deviantart', 'esport' ) . '" target="_blank"><i class="fa fa-deviantart"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_digg' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_digg' ) . '" class="digg" title="' . esc_html__( 'Digg', 'esport' ) . '" target="_blank"><i class="fa fa-digg"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_dribbble' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_dribbble' ) . '" class="dribbble" title="' . esc_html__( 'Dribbble', 'esport' ) . '" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_flickr' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_flickr' ) . '" class="flickr" title="' . esc_html__( 'Flickr', 'esport' ) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_github' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_github' ) . '" class="github"" title="' . esc_html__( 'GitHub', 'esport' ) . '" target="_blank"><i class="fa fa-github"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_lastfm' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_lastfm' ) . '" class="lastfm" title="' . esc_html__( 'Last.fm', 'esport' ) . '" target="_blank"><i class="fa fa-lastfm"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_reddit' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_reddit' ) . '" class="reddit" title="' . esc_html__( 'Reddit', 'esport' ) . '" target="_blank"><i class="fa fa-reddit"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_soundcloud' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_soundcloud' ) . '" class="soundcloud" title="' . esc_html__( 'SoundCloud', 'esport' ) . '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_tumblr' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_tumblr' ) . '" class="tumblr" title="' . esc_html__( 'Tumblr', 'esport' ) . '" target="_blank"><i class="fa fa-tumblr"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vimeo' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vimeo' ) . '" class="vimeo" title="' . esc_html__( 'Vimeo', 'esport' ) . '" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_vk' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_vk' ) . '" class="vk" title="' . esc_html__( 'VK', 'esport' ) . '" target="_blank"><i class="fa fa-vk"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_medium' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_medium' ) . '" class="medium" title="' . esc_html__( 'Medium', 'esport' ) . '" target="_blank"><i class="fa fa-medium"></i></a></li>';
			endif;

			if( !ot_get_option( 'social_media_rss' ) == ""  ) :
				$output .='<li><a href="' . ot_get_option( 'social_media_rss' ) . '" class="rss" title="' . esc_html__( 'RSS', 'esport' ) . '" target="_blank"><i class="fa fa-rss"></i></a></li>';
			endif;
		$output .='</ul>';
		return stripslashes( addslashes( $output ) );
	}
	/*------------- SOCIAL MEDIA LINKS TEMPLATE END -------------*/

	/*------------- POST SOCIAL SHARE TEMPLATE START -------------*/
	function esport_general_post_social_share() {
		$social_share_facebook = ot_get_option( 'social_share_facebook' );
		$social_share_twitter = ot_get_option( 'social_share_twitter' );
		$social_share_googleplus = ot_get_option( 'social_share_googleplus' );
		$social_share_linkedin = ot_get_option( 'social_share_linkedin' );
		$social_share_pinterest = ot_get_option( 'social_share_pinterest' );
		$social_share_reddit = ot_get_option( 'social_share_reddit' );
		$social_share_delicious = ot_get_option( 'social_share_delicious' );
		$social_share_stumbleupon = ot_get_option( 'social_share_stumbleupon' );
		$social_share_tumblr = ot_get_option( 'social_share_tumblr' );
		$social_share_link_title = esc_html__( 'Share to', 'esport' );
		$hide_general_post_share = ot_get_option( 'hide_general_post_share' );
		$share_post_id = get_the_ID();
		
		$facebook = "";
		$twitter = "";
		$googleplus = "";
		$linkedin = "";
		$pinterest = "";	
		$reddit = "";
		$delicious = "";
		$stumbleupon = "";
		$tumblr = "";
		
		if( !$hide_general_post_share == 'off' or $hide_general_post_share == "on" ) {

			if( !$social_share_facebook == 'off' or $social_share_facebook == 'on' ) {
				$facebook = '<li><a class="share-facebook"  href="https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&t=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Facebook', 'esport' ) . '" target="_blank"><i class="fa fa-facebook"></i>' . '<span>' . esc_html__( 'Facebook', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_twitter == 'off' or $social_share_twitter == 'on' ) {
				$twitter = '<li><a class="share-twitter"  href="https://twitter.com/intent/tweet?url=' . get_the_permalink() . '&text=' . urlencode( get_the_title() ). '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Twitter', 'esport' ) . '" target="_blank"><i class="fa fa-twitter"></i>' . '<span>' . esc_html__( 'Twitter', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_googleplus == 'off' or $social_share_googleplus == 'on' ) {
				$googleplus = '<li><a class="share-googleplus"  href="https://plus.google.com/share?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Google+', 'esport' ) . '" target="_blank"><i class="fa fa-google-plus"></i>' . '<span>' . esc_html__( 'Google+', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_linkedin == 'off' or $social_share_linkedin == 'on' ) {
				$linkedin = '<li><a class="share-linkedin"  href="https://www.linkedin.com/shareArticle?mini=true&amp;url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Linkedin', 'esport' ) . '" target="_blank"><i class="fa fa-linkedin"></i>' . '<span>' . esc_html__( 'LinkedIn', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_pinterest == 'off' or $social_share_pinterest == 'on' ) {
				$pinterest = '<li><a class="share-pinterest"  href="https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&description=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Pinterest', 'esport' ) . '" target="_blank"><i class="fa fa-pinterest-p"></i>' . '<span>' . esc_html__( 'Pinterest', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_reddit == 'off' or $social_share_reddit == 'on' ) {
				$reddit = '<li><a class="share-reddit"  href="http://reddit.com/submit?url=' . get_the_permalink() . '&title=' . urlencode( get_the_title() ) . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Reddit', 'esport' ) . '" target="_blank"><i class="fa fa-reddit"></i>' . '<span>' . esc_html__( 'Reddit', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_delicious == 'off' or $social_share_delicious == 'on' ) {
				$delicious = '<li><a class="share-delicious"  href="http://del.icio.us/post?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Delicious', 'esport' ) . '" target="_blank"><i class="fa fa-delicious"></i>' . '<span>' . esc_html__( 'Delicious', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_stumbleupon == 'off' or $social_share_stumbleupon == 'on' ) {
				$stumbleupon = '<li><a class="share-stumbleupon"  href="http://www.stumbleupon.com/submit?url=' . get_the_permalink() . '&title=' . get_the_title() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Stumbleupon', 'esport' ) . '" target="_blank"><i class="fa fa-stumbleupon"></i>' . '<span>' . esc_html__( 'Stumbleupon', 'esport' ) . '</span>' . '</a></li>';
			}

			if( !$social_share_tumblr == 'off' or $social_share_tumblr == 'on' ) {
				$tumblr = '<li><a class="share-tumblr"  href="http://www.tumblr.com/share/link?url=' . get_the_permalink() . '" title="' . esc_attr( $social_share_link_title ) . esc_html__( 'Tumblr', 'esport' ) . '" target="_blank"><i class="fa fa-tumblr"></i>' . '<span>' . esc_html__( 'Tumblr', 'esport' ) . '</span>' . '</a></li>';
			}
		}
		
		$before = '<div class="post-share"><ul>';
		$after = '</ul></div>';
		
		$output = $before . $facebook . $twitter . $googleplus . $linkedin . $pinterest . $reddit . $delicious . $stumbleupon . $tumblr . $after;
		return stripslashes( addslashes( $output ) );
	}
	/*------------- POST SOCIAL SHARE TEMPLATE END -------------*/

	/*------------- USER PROFILE SOCIAL MEDIA START -------------*/
	function esport_user_profile_social_media_links( $user_id = "" ) {
		$user_profile_social_media_facebook = get_the_author_meta( 'facebook', $user_id );
		$user_profile_social_media_googleplus = get_the_author_meta( 'googleplus', $user_id );
		$user_profile_social_media_instagram = get_the_author_meta( 'instagram', $user_id );
		$user_profile_social_media_linkedin = get_the_author_meta( 'linkedin', $user_id );
		$user_profile_social_media_vine = get_the_author_meta( 'vine', $user_id );
		$user_profile_social_media_twitter = get_the_author_meta( 'twitter', $user_id );
		$user_profile_social_media_pinterest = get_the_author_meta( 'pinterest', $user_id );
		$user_profile_social_media_youtube = get_the_author_meta( 'youtube', $user_id );
		$user_profile_social_media_behance = get_the_author_meta( 'behance', $user_id );
		$user_profile_social_media_deviantart = get_the_author_meta( 'deviantart', $user_id );
		$user_profile_social_media_digg = get_the_author_meta( 'digg', $user_id );
		$user_profile_social_media_dribbble = get_the_author_meta( 'dribbble', $user_id );
		$user_profile_social_media_flickr = get_the_author_meta( 'flickr', $user_id );
		$user_profile_social_media_github = get_the_author_meta( 'github', $user_id );
		$user_profile_social_media_lastfm = get_the_author_meta( 'lastfm', $user_id );
		$user_profile_social_media_reddit = get_the_author_meta( 'reddit', $user_id );
		$user_profile_social_media_soundcloud = get_the_author_meta( 'soundcloud', $user_id );
		$user_profile_social_media_tumblr = get_the_author_meta( 'tumblr', $user_id );
		$user_profile_social_media_vimeo = get_the_author_meta( 'vimeo', $user_id );
		$user_profile_social_media_vk = get_the_author_meta( 'vk', $user_id );
		$user_profile_social_media_medium = get_the_author_meta( 'medium', $user_id );

		if( !$user_profile_social_media_medium == "" or !$user_profile_social_media_vk == "" or !$user_profile_social_media_vimeo == "" or !$user_profile_social_media_tumblr == "" or !$user_profile_social_media_soundcloud == "" or !$user_profile_social_media_reddit == "" or !$user_profile_social_media_lastfm == "" or !$user_profile_social_media_github == "" or !$user_profile_social_media_flickr == "" or !$user_profile_social_media_dribbble == "" or !$user_profile_social_media_digg == "" or !$user_profile_social_media_deviantart == "" or !$user_profile_social_media_behance == "" or !$user_profile_social_media_youtube == "" or !$user_profile_social_media_pinterest == "" or !$user_profile_social_media_twitter == "" or !$user_profile_social_media_vine == "" or !$user_profile_social_media_linkedin == "" or !$user_profile_social_media_facebook == "" or !$user_profile_social_media_googleplus == ""  or !$user_profile_social_media_instagram == "" ) { ?>

			<div class="author-social-links">
				<ul>
					<?php if( !$user_profile_social_media_facebook == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_facebook ); ?>" title="<?php echo esc_html__( 'Facebook', 'esport' ); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_googleplus == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_googleplus ); ?>" title="<?php echo esc_html__( 'Google+', 'esport' ); ?>" target="_blank" class="googleplus"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_instagram == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_instagram ); ?>" title="<?php echo esc_html__( 'Instagram', 'esport' ); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_linkedin == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_linkedin ); ?>" title="<?php echo esc_html__( 'LinkedIn', 'esport' ); ?>" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vine == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vine ); ?>" title="<?php echo esc_html__( 'Vine', 'esport' ); ?>" target="_blank" class="vine"><i class="fa fa-vine"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_twitter == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_twitter ); ?>" title="<?php echo esc_html__( 'Twitter', 'esport' ); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_pinterest == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_pinterest ); ?>" title="<?php echo esc_html__( 'Pinterest', 'esport' ); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_youtube == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_youtube ); ?>" title="<?php echo esc_html__( 'YouTube', 'esport' ); ?>" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_behance == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_behance ); ?>" title="<?php echo esc_html__( 'Behance', 'esport' ); ?>" target="_blank" class="behance"><i class="fa fa-behance"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_deviantart == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_deviantart ); ?>" title="<?php echo esc_html__( 'DeviantArt', 'esport' ); ?>" target="_blank" class="deviantart"><i class="fa fa-deviantart"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_digg == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_digg ); ?>" title="<?php echo esc_html__( 'Digg', 'esport' ); ?>" target="_blank" class="digg"><i class="fa fa-digg"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_dribbble == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_dribbble ); ?>" title="<?php echo esc_html__( 'Dribbble', 'esport' ); ?>" target="_blank" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_flickr == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_flickr ); ?>" title="<?php echo esc_html__( 'Flickr', 'esport' ); ?>" target="_blank" class="flickr"><i class="fa fa-flickr"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_github == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_github ); ?>" title="<?php echo esc_html__( 'GitHub', 'esport' ); ?>" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_lastfm == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_lastfm ); ?>" title="<?php echo esc_html__( 'Last.fm', 'esport' ); ?>" target="_blank" class="lastfm"><i class="fa fa-lastfm"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_reddit == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_reddit ); ?>" title="<?php echo esc_html__( 'Reddit', 'esport' ); ?>" target="_blank" class="reddit"><i class="fa fa-reddit"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_soundcloud == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_soundcloud ); ?>" title="<?php echo esc_html__( 'SoundCloud', 'esport' ); ?>" target="_blank" class="soundcloud"><i class="fa fa-soundcloud"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_tumblr == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_tumblr ); ?>" title="<?php echo esc_html__( 'Tumblr', 'esport' ); ?>" target="_blank" class="tumblr"><i class="fa fa-tumblr"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vimeo == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vimeo ); ?>" title="<?php echo esc_html__( 'Vimeo', 'esport' ); ?>" target="_blank" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_vk == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_vk ); ?>" title="<?php echo esc_html__( 'VK', 'esport' ); ?>" target="_blank" class="vk"><i class="fa fa-vk"></i></a></li>
					<?php endif; ?>
					
					<?php if( !$user_profile_social_media_medium == ""  ) : ?>
						<li><a href="<?php echo esc_url( $user_profile_social_media_medium ); ?>" title="<?php echo esc_html__( 'Medium', 'esport' ); ?>" target="_blank" class="medium"><i class="fa fa-medium"></i></a></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php
		}
	}
	/*------------- USER PROFILE SOCIAL MEDIA END -------------*/
/*------------- SOCIAL SHARE END -------------*/

/*------------- SHOP START -------------*/
	/*------------- WOOCOMMERCE GENERAL START -------------*/
	if(class_exists('Woocommerce') ) {
		function esport_woocommerce_support() {
			add_theme_support( 'woocommerce' );
		}
		add_action( 'after_setup_theme', 'esport_woocommerce_support' );
	}
	/*------------- WOOCOMMERCE GENERAL END -------------*/

	/*------------- WOOCOMMERCE COLUMNS END -------------*/
	function esport_related_products_args( $args ) {
		$related_product_count = esc_attr( ot_get_option( 'woocommerce_related_product_count_column' ) );
		if( !empty( $related_product_count ) ) {
			$args['posts_per_page'] = $related_product_count;
			$args['columns'] = 4;
		} else {
			$args['posts_per_page'] = 4;
			$args['columns'] = 4;
		}
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'esport_related_products_args' );

	if (!function_exists('esport_loop_columns')) {
		function esport_loop_columns() {
			$woocommerce_shop_product_column = esc_attr( ot_get_option( 'woocommerce_shop_product_column' ) );
			if( !empty( $woocommerce_shop_product_column ) ) {
				return $woocommerce_shop_product_column;
			} else {
				return 3;
			}
		}
	}
	add_filter('loop_shop_columns', 'esport_loop_columns');
	/*------------- WOOCOMMERCE COLUMNS START -------------*/

	/*------------- GENERAL SHOP BUY NOW LINK START -------------*/
	function esport_shop_buy_now( $product_id = "" ) {
		if( !empty( $product_id ) ) {
			$output = '<a href="' . get_the_permalink( $product_id ). '" class="more-button" title="' . the_title_attribute( array( 'echo' => 0,  'post' => $product_id ) ) . '">';
				$output .= '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
				$output .= '<span>' . esc_html__( 'Buy Now', 'esport' ) . '</span>';
			$output .= '</a>';
			return $output;
		}
	}
	/*------------- GENERAL SHOP BUY NOW LINK END -------------*/

	/*------------- GENERAL PRICE START -------------*/
	function esport_product_price( $product_id = "" ) {
		if( !empty( $product_id ) ) {
			global $product;
			$output = '<div class="price">' . stripslashes( addslashes( $product->get_price_html() ) ) . '</div>';
			return $output;
		}
	}
	/*------------- GENERAL PRICE END -------------*/
/*------------- SHOP END -------------*/

/*------------- POST LIST STYLES START -------------*/
	/*------------- POST LIST STYLE 1 START -------------*/
	function esport_post_list_style_1( $post_id = "", $image = "", $category = "", $excerpt = "", $read_more = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			if ( is_sticky( get_the_ID() ) ) {
				$output .= '<div class="post-list-styles post-list-style-1 sticky-post">';
			} else {
				$output .= '<div class="post-list-styles post-list-style-1">';
			}
				if( $image == 'true' ) {
						if ( has_post_thumbnail( $post_id ) ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'esport-big-post' );
						} else {
							$image_url = "";
						}

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
								if( $category == 'true' ) {
									$output .= '<div class="category">';
										$output .= get_the_category_list( '', '', $post_id );
									$output .= '</div>';
								}
							$output .= '</div>';
						}
				}

				$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

				if( $excerpt == 'true' ) {
					$excert_control = get_the_excerpt();
					if( !empty( $excert_control ) ) {
						$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
					}
				}

				if( $read_more == 'true' or $post_info == 'true' ) {
					$output .= '<div class="bottom">';
						if( $read_more == 'true' ) {
							$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" class="more-button">' . esc_html__( 'More', 'esport' ) . '</a>';
						}

						if( $post_info == 'true' ) {
							$output .= '<ul class="post-information">';
								$output .= '<li class="date"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</li>';
								$output .= '<li class="comment"><i class="fa fa-comment" aria-hidden="true"></i>';
									$output .= '<a href="' . get_the_permalink( $post_id ) . '#comments" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">';
										$num_comments = get_comments_number( $post_id );
										if ( $num_comments == 0 ) {
											$comments = esc_html__( '0 Comment', 'esport' );
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . ' ' . esc_html__( 'Comments', 'esport' );
										} else {
											$comments = esc_html__( '1 Comment', 'esport' );
										}
										$output .= $comments;
									$output .= '</a>';
								$output .= '</li>';
							$output .= '</ul>';
						}
					$output .= '</div>';
				}
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 1 END -------------*/

	/*------------- POST LIST STYLE 2 START -------------*/
	function esport_post_list_style_2( $post_id = "", $image = "", $category = "", $excerpt = "", $read_more = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			if ( is_sticky( get_the_ID() ) ) {
				$output .= '<div class="post-list-styles post-list-style-2 sticky-post">';
			} else {
				$output .= '<div class="post-list-styles post-list-style-2">';
			}
				if( $image == 'true' ) {
						if ( has_post_thumbnail( $post_id ) ) {
							$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'esport-small-post' );
						} else {
							$image_url = "";
						}

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
								if( $category == 'true' ) {
									$output .= '<div class="category">';
										$output .= get_the_category_list( '', '', $post_id );
									$output .= '</div>';
								}
							$output .= '</div>';
						}
				}

				$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

				if( $excerpt == 'true' ) {
					$excert_control = get_the_excerpt();
					if( !empty( $excert_control ) ) {
						$output .= '<div class="excerpt">' . get_the_excerpt() . '</div>';
					}
				}

				if( $read_more == 'true' or $post_info == 'true' ) {
					$output .= '<div class="bottom">';
						if( $read_more == 'true' ) {
							$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" class="more-button">' . esc_html__( 'More', 'esport' ) . '</a>';
						}

						if( $post_info == 'true' ) {
							$output .= '<ul class="post-information">';
								$output .= '<li class="date"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</li>';
								$output .= '<li class="comment"><i class="fa fa-comment" aria-hidden="true"></i>';
									$output .= '<a href="' . get_the_permalink( $post_id ) . '#comments" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">';
										$num_comments = get_comments_number( $post_id );
										if ( $num_comments == 0 ) {
											$comments = esc_html__( '0 Comment', 'esport' );
										} elseif ( $num_comments > 1 ) {
											$comments = $num_comments . ' ' . esc_html__( 'Comments', 'esport' );
										} else {
											$comments = esc_html__( '1 Comment', 'esport' );
										}
										$output .= $comments;
									$output .= '</a>';
								$output .= '</li>';
							$output .= '</ul>';
						}
					$output .= '</div>';
				}
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 2 END -------------*/

	/*------------- POST LIST STYLE 3 START -------------*/
	function esport_post_list_style_3( $post_id = "", $image = "", $post_info = "" ) {
		if( !empty( $post_id ) ) {
			$output  = "";
			$output .= '<div class="post-list-styles post-list-style-3">';
				if( $image == 'true' ) {
					if ( has_post_thumbnail( $post_id ) ) {
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail' );

						if( !empty( $image_url ) ) {
							$output .= '<div class="image">';
								$output .= '<a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '"><img src="' . esc_url( $image_url[0] ) . '" alt="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '" /></a>';
							$output .= '</div>';
						}
					} else {
						$image_url = "";
					}
				}

				$output .= '<div class="desc">';
					$output .= '<div class="title"><a href="' . get_the_permalink( $post_id ) . '" title="' . the_title_attribute( array( 'echo' => 0, 'post' => $post_id ) ) . '">' . get_the_title( $post_id ) . '</a></div>';

					if( $post_info == 'true' ) {
						$output .= '<div class="post-information"><i class="fa fa-calendar" aria-hidden="true"></i>' . get_the_time( get_option( 'date_format' ), $post_id ) . '</div>';
					}
				$output .= '</div>';
			$output .= '</div>';
			return $output;
		}
	}
	/*------------- POST LIST STYLE 3 END -------------*/

	/*------------- ARCHIVE POST LIST STYLES START -------------*/
	function esport_archive_post_list_styles() {
		function esport_archive_post_list_styles_style1() {
			echo '<div class="archive-post-list-style-1 post-list">';
				while ( have_posts() ) : the_post();
					echo esport_post_list_style_1( $post_id = get_the_ID(), $image = "true", $category = "true", $excerpt = "true", $read_more = "true", $post_info = "true" );
				endwhile;
			echo '</div>';
		}
		
		function esport_archive_post_list_styles_style2() {
			echo '<div class="archive-post-list-style-5 post-list">';
				while ( have_posts() ) : the_post();
					echo esport_post_list_style_2( $post_id = get_the_ID(), $image = "true", $category = "true", $excerpt = "true", $read_more = "true", $post_info = "true" );
				endwhile;
			echo '</div>';
		}

		if( is_category() ) {
			$archive_archive_post_list_style = ot_get_option( 'blog_category_post_list_style' );
		} elseif( is_tag() ) {
			$archive_archive_post_list_style = ot_get_option( 'tag_tag_post_list_style' );
		} elseif( is_search() ) {
			$archive_archive_post_list_style = ot_get_option( 'search_search_post_list_style' );
		} else {
			$archive_archive_post_list_style = ot_get_option( 'archive_archive_post_list_style' );
		}
		
		if( is_category() ) {
			$cat = get_queried_object();
			$cat_id = $cat->term_id;
			$esport_category_category_post_list_style = get_term_meta( $cat_id, 'esport_category_category_post_list_style', true );
			if( $esport_category_category_post_list_style == "post-list-style-1" ) {
				esport_archive_post_list_styles_style1();				
			} elseif( $esport_category_category_post_list_style == "post-list-style-2" ) {
				esport_archive_post_list_styles_style2();				
			} else {
				if( $archive_archive_post_list_style == "style2" ) {
					esport_archive_post_list_styles_style2();
				} else {
					esport_archive_post_list_styles_style1();
				}
			}

		} else {
			if( $archive_archive_post_list_style == "style2" ) {
				esport_archive_post_list_styles_style2();
			} else {
				esport_archive_post_list_styles_style1();
			}
		}
	}
	/*------------- ARCHIVE POST LIST STYLES END -------------*/
/*------------- POST LIST STYLES END -------------*/

/*------------- TITLES START -------------*/
	/*------------- ARCHIVE TITLES START -------------*/
	function esport_archive_title() {
		echo '<div class="page-title-breadcrumbs">';
			echo '<div class="page-title-breadcrumbs-image"></div>';
			echo '<div class="container">';
				echo '<h1>';
					if( is_category() ) {
						$blog_category_title = ot_get_option( 'blog_category_title' );
						if( !$blog_category_title == 'off' or $blog_category_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses( printf( __( '<span>%s</span>', 'esport' ), single_cat_title( '', false ) ) , $allowed_html );
						}
					} elseif( is_tag() ) {
						$tag_tag_title = ot_get_option( 'tag_tag_title' );
						if( !$tag_tag_title == 'off' or $tag_tag_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses( printf( __( '<span>%s</span>', 'esport' ), single_tag_title( '', false ) ) , $allowed_html );
						}
					} elseif( is_search() ) {
						$search_search_title = ot_get_option( 'search_search_title' );
						if( !$search_search_title == 'off' or $search_search_title == 'on' ) {
							$allowed_html = array ( 'span' => array() ); wp_kses ( printf( __( '<span>%s</span>', 'esport' ), get_search_query() ) , $allowed_html ); 
						}
					} elseif( is_author() ) {
						printf( esc_html__( '%s', 'esport' ), '' . get_the_author() . '' );
					} elseif( is_home() ) {
						echo esc_html__( 'Home', 'esport' );
					} elseif( is_attachment() ) {
						$attachment_attachment_title = ot_get_option( 'attachment_attachment_title' );
						if( !$attachment_attachment_title == 'off' or $attachment_attachment_title == 'on' ) {
							echo get_the_title();
						}
					} elseif( is_page() ) {
						$page_title = ot_get_option( 'page_title' );
						if( !$page_title == 'off' or $page_title == 'on' ) {
							echo get_the_title();
						}
					} elseif( is_single() ) {
						$post_post_title = ot_get_option( 'post_post_title' );
						if( !$post_post_title == 'off' or $post_post_title == 'on' ) {
							echo get_the_title();
						}
					} elseif( is_bbpress() ) {
						$archive_esport_archive_title = ot_get_option( 'archive_esport_archive_title' );
						if( !$archive_esport_archive_title == 'off' or $archive_esport_archive_title == 'on' ) {
							echo esc_html__( 'Forums', 'esport' );
						}
					} else {
						$archive_esport_archive_title = ot_get_option( 'archive_esport_archive_title' );
						if( !$archive_esport_archive_title == 'off' or $archive_esport_archive_title == 'on' ) {
							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'esport' ), get_the_date() );
							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'esport' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'esport' ) ) );
							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'esport' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'esport' ) ) );
							else :
								echo esc_html__( 'Archives', 'esport' );
							endif;
						}
					}
				echo '</h1>';
			echo '</div>';
		echo '</div>';
	}

	function esport_archive_title_none() {
		echo '<div class="archive-title-none"></div>';
	}
	/*------------- ARCHIVE TITLES END -------------*/

	/*------------- CONTENT TITLES START -------------*/
	function esport_content_title_start( $text = "" ) {
		echo '<div class="content-title-wrapper">';
			echo '<div class="title">' . $text . '</div>';
		echo '</div>';
	}

	function esport_content_alternative_title_start( $text = "" ) {
		echo '<span class="content-alternative-wrapper-title">' . $text . '</span>';
	}
	/*------------- CONTENT TITLES END -------------*/
/*------------- TITLES END -------------*/

/*------------- SIDEBARS & COLUMNS START -------------*/
	/*------------- CREATE SIDEBARS START -------------*/
	if( !function_exists( 'esport_sidebars_init' ) ) {
		function esport_sidebars_init() {
			register_sidebar(array(
				'id' => 'general-sidebar',
				'name' => esc_html__( 'General Sidebar', 'esport' ),
				'before_widget' => '<div id="%1$s" class="general-sidebar-wrap widget-box %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title">',
				'after_title' => '</div>',
			));
			
			register_sidebar(array(
				'id' => 'shop-sidebar',
				'name' => esc_html__( 'Shop Sidebar', 'esport' ),
				'before_widget' => '<div id="%1$s" class="shop-sidebar-wrap widget-box %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<div class="widget-title">',
				'after_title' => '</div>',
			));
		}
	}

	add_action( 'widgets_init', 'esport_sidebars_init' );
	/*------------- CREATE SIDEBARS END -------------*/

	/*------------- SIDEBAR START -------------*/
	function esport_post_content_area_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');

			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
		} else {
			if( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left right fixedSidebar">';
			}
		}
	}

	function esport_post_sidebar_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$cat = get_queried_object();
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {			
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		} else {
			if( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$cat = get_queried_object();
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}

			if ( is_page() or is_single() ) {			
				global $post;
				$layout_select = get_post_meta( $post->ID, 'sidebar_position', true);
			} else {
				$layout_select = "";
			}
			
			if( $layout_select == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $layout_select == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		}
	}

	function esport_content_area_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right site-content-left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
		} else {
			if( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fullwidthsidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-right site-content-left pull-right fixedSidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
			
			else {
				echo '<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 site-content-left fixedSidebar">';
			}
		}
	}

	function esport_sidebar_start() {
		if(class_exists('Woocommerce') ) {
			if( is_shop() ) {
				$sidebar_position = ot_get_option('woocommerce_sidebar_position');
			} elseif( is_product() ) {
				$sidebar_position = ot_get_option('woocommerce_product_sidebar_position');
			} elseif( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		} else {
			if( is_category() ) {
				$cat = get_queried_object();
				$cat_id = $cat->term_id;
				$esport_category_sidebar_style = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				if( !empty( $esport_category_sidebar_style ) ) {
					$sidebar_position = get_term_meta( $cat_id, 'esport_category_sidebar_style', true );
				} else {
					$sidebar_position = ot_get_option('category_sidebar_position');
				}
			} elseif( is_tag() ) {
				$sidebar_position = ot_get_option('tag_sidebar_position');
			} elseif( is_author() ) {
				$sidebar_position = ot_get_option('author_sidebar_position');
			} elseif( is_search() ) {
				$sidebar_position = ot_get_option('search_sidebar_position');
			} elseif( is_archive() ) {
				$sidebar_position = ot_get_option('archive_sidebar_position');
			} elseif( is_attachment() ) {
				$sidebar_position = ot_get_option('attachment_sidebar_position');
			} elseif( is_single() ) {
				$sidebar_position = ot_get_option('post_sidebar_position');
			} elseif( is_page() ) {
				$sidebar_position = ot_get_option('page_sidebar_position');
			} else {
				$sidebar_position = ot_get_option( 'sidebar_position' );
			}
			
			if( $sidebar_position == 'nosidebar' ) {
				echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'left' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right left fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			elseif( $sidebar_position == 'right' ) {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right right fixedSidebar"><div class="theiaStickySidebar">';
			}
			
			else {
				echo '<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 site-content-right fixedSidebar"><div class="theiaStickySidebar">';
			}
		}
	}

	function esport_content_area_end() {
		echo '</div>';
	}

	function esport_sidebar_end() {
		echo '</div></div>';
	}
	/*------------- SIDEBAR END -------------*/

	/*------------- WRAPPER BEFORE START -------------*/
	function esport_wrapper_before() {
		?>
			<div class="esport-wrapper" id="general-wrapper">
		<?php
	}
	/*------------- WRAPPER BEFORE END -------------*/

	/*------------- WRAPPER AFTER START -------------*/
	function esport_wrapper_after() {
		?>
			</div>
		<?php
	}
	/*------------- WRAPPER AFTER END -------------*/

	/*------------- SITE CONTENT START -------------*/
	function esport_site_content_start() {
		?>
			<div class="site-content">
		<?php
	}

	function esport_site_content_end() {
		?>			
			</div>
		<?php
	}
	/*------------- SITE CONTENT END -------------*/

	/*------------- SITE SUB CONTENT START -------------*/
	function esport_site_sub_content_start() {
		?>
			<div class="site-sub-content">
		<?php
	}

	function esport_site_sub_content_end() {
		?>			
			</div>
		<?php
	}
	/*------------- SITE SUB CONTENT END -------------*/

	/*------------- WIDGET CONTENT BEFORE START -------------*/
	function esport_widget_content_before() {
		?>
			<div class="widget-content">
		<?php
	}
	/*------------- WIDGET CONTENT BEFORE END -------------*/

	/*------------- WIDGET CONTENT AFTER START -------------*/
	function esport_widget_content_after() {
		?>
			</div>
		<?php
	}
	/*------------- WIDGET CONTENT AFTER END -------------*/

	/*------------- SITE PAGE CONTENT BEFORE START -------------*/
	function esport_site_page_content_before() {
		?>
			<div class="site-page-content">
		<?php
	}
	/*------------- SITE PAGE CONTENT BEFORE END -------------*/

	/*------------- SITE PAGE CONTENT AFTER START -------------*/
	function esport_site_page_content_after() {
		?>
			</div>
		<?php
	}
	/*------------- SITE PAGE CONTENT AFTER END -------------*/

	/*------------- CONTAINER BEFORE START -------------*/
	function esport_container_before() {
		?>
			<div class="container">
		<?php
	}
	/*------------- CONTAINER BEFORE END -------------*/

	/*------------- CONTAINER AFTER START -------------*/
	function esport_container_after() {
		?>
			</div>
		<?php
	}
	/*------------- CONTAINER AFTER END -------------*/

	/*------------- ROW BEFORE START -------------*/
	function esport_row_before() {
		?>
			<div class="row">
		<?php
	}
	/*------------- ROW BEFORE END -------------*/

	/*------------- ROW AFTER START -------------*/
	function esport_row_after() {
		?>
			</div>
		<?php
	}
	/*------------- ROW AFTER END -------------*/
/*------------- SIDEBARS & COLUMNS END -------------*/