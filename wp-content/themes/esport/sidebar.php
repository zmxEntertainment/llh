<?php
if(class_exists('Woocommerce') ) {
	if ( is_woocommerce() ) {

		if ( is_active_sidebar( 'shop-sidebar' ) )  {
			esport_sidebar_start();
				dynamic_sidebar("shop-sidebar");
			esport_sidebar_end(); 
		}
		
	} elseif ( is_attachment() ) {

		$attachment_sidebar_select = ot_get_option( 'attachment_sidebar_select' );

		if ( !empty( $attachment_sidebar_select) ) {
			if ( is_active_sidebar( $attachment_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $attachment_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif( is_single() ) {
		
		$post_id = get_the_ID();
		$post_sidebar_select = ot_get_option( 'post_sidebar_select' );
		$post_sidebar = get_post_meta( $post_id, 'post_sidebar_select', true );
		
		if( !empty( $post_sidebar ) ) {
			if ( is_active_sidebar( $post_sidebar ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar ); 
				esport_sidebar_end();
			}
			
		} elseif ( !empty( $post_sidebar_select) ) {
			if ( is_active_sidebar( $post_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	}  elseif( is_page() ) {
		
		$post_id = get_the_ID();
		$page_sidebar_select = ot_get_option( 'page_sidebar_select' );
		$post_sidebar = get_post_meta( $post_id, 'page_sidebar_select', true );
		
		if( !empty( $post_sidebar ) ) {
			if ( is_active_sidebar( $post_sidebar ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar ); 
				esport_sidebar_end();
			}
			
		} elseif ( !empty( $page_sidebar_select) ) {
			if ( is_active_sidebar( $page_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $page_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}

	} elseif ( is_category() ) {
		
		$cat = get_queried_object();
		$cat_id = $cat->term_id;
		$category_sidebar_settings = ot_get_option('sidebar_select_'. $cat_id); 

		if( !empty( $category_sidebar_settings ) ) {
			if ( is_active_sidebar( $category_sidebar_settings ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $category_sidebar_settings ); 
				esport_sidebar_end();
			}
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	}elseif ( is_tag() ) {

		$tag_sidebar_select = ot_get_option( 'tag_sidebar_select' );

		if ( !empty( $tag_sidebar_select) ) {
			if ( is_active_sidebar( $tag_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $tag_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_author() ) {

		$author_sidebar_select = ot_get_option( 'author_sidebar_select' );

		if ( !empty( $author_sidebar_select) ) {
			if ( is_active_sidebar( $author_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $author_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_search() ) {

		$search_sidebar_select = ot_get_option( 'search_sidebar_select' );

		if ( !empty( $search_sidebar_select) ) {
			if ( is_active_sidebar( $search_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $search_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_archive() ) {

		$archive_sidebar_select = ot_get_option( 'archive_sidebar_select' );

		if ( !empty( $archive_sidebar_select) ) {
			if ( is_active_sidebar( $archive_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $archive_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} else {
		if ( is_active_sidebar( 'general-sidebar' ) )  {
			esport_post_sidebar_start();
				dynamic_sidebar("general-sidebar");
			esport_sidebar_end(); 			
		}
	}
} else {
	if ( is_attachment() ) {

		$attachment_sidebar_select = ot_get_option( 'attachment_sidebar_select' );

		if ( !empty( $attachment_sidebar_select) ) {
			if ( is_active_sidebar( $attachment_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $attachment_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif( is_single() ) {
		
		$post_id = get_the_ID();
		$post_sidebar_select = ot_get_option( 'post_sidebar_select' );
		$post_sidebar = get_post_meta( $post_id, 'post_sidebar_select', true );
		
		if( !empty( $post_sidebar ) ) {
			if ( is_active_sidebar( $post_sidebar ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar ); 
				esport_sidebar_end();
			}
			
		} elseif ( !empty( $post_sidebar_select) ) {
			if ( is_active_sidebar( $post_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	}  elseif( is_page() ) {
		
		$post_id = get_the_ID();
		$page_sidebar_select = ot_get_option( 'page_sidebar_select' );
		$post_sidebar = get_post_meta( $post_id, 'page_sidebar_select', true );
		
		if( !empty( $post_sidebar ) ) {
			if ( is_active_sidebar( $post_sidebar ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $post_sidebar ); 
				esport_sidebar_end();
			}
			
		} elseif ( !empty( $page_sidebar_select) ) {
			if ( is_active_sidebar( $page_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $page_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}

	} elseif ( is_category() ) {
		
		$cat = get_queried_object();
		$cat_id = $cat->term_id;
		$category_sidebar_settings = ot_get_option('sidebar_select_'. $cat_id); 

		if( !empty( $category_sidebar_settings ) ) {
			if ( is_active_sidebar( $category_sidebar_settings ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $category_sidebar_settings ); 
				esport_sidebar_end();
			}
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	}elseif ( is_tag() ) {

		$tag_sidebar_select = ot_get_option( 'tag_sidebar_select' );

		if ( !empty( $tag_sidebar_select) ) {
			if ( is_active_sidebar( $tag_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $tag_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_author() ) {

		$author_sidebar_select = ot_get_option( 'author_sidebar_select' );

		if ( !empty( $author_sidebar_select) ) {
			if ( is_active_sidebar( $author_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $author_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_search() ) {

		$search_sidebar_select = ot_get_option( 'search_sidebar_select' );

		if ( !empty( $search_sidebar_select) ) {
			if ( is_active_sidebar( $search_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $search_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} elseif ( is_archive() ) {

		$archive_sidebar_select = ot_get_option( 'archive_sidebar_select' );

		if ( !empty( $archive_sidebar_select) ) {
			if ( is_active_sidebar( $archive_sidebar_select ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar( $archive_sidebar_select ); 
				esport_sidebar_end();
			}
			
		} else {
			if ( is_active_sidebar( 'general-sidebar' ) )  {
				esport_post_sidebar_start();
					dynamic_sidebar("general-sidebar");
				esport_sidebar_end(); 			
			}
		}
		
	} else {
		if ( is_active_sidebar( 'general-sidebar' ) )  {
			esport_post_sidebar_start();
				dynamic_sidebar("general-sidebar");
			esport_sidebar_end(); 			
		}
	}
}
