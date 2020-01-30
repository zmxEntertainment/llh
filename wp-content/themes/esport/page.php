<?php
/*
	* The template for displaying page
*/
get_header(); ?>

	<?php esport_site_sub_content_start(); ?>
		<?php
			$post_post_title_each = get_post_meta( get_the_ID(), 'page_title', true );
			$full_with_container = get_post_meta( get_the_ID(), 'full_with_container', true );
			$post_post_title = ot_get_option( 'post_post_title' );
			if( !$post_post_title == 'off' or $post_post_title == 'on' ) {
				if( !$post_post_title_each == 'off' or $post_post_title_each == 'on' ) {
					esport_archive_title();
				}
			}
		?>
		<?php
			if( $full_with_container == "off" or !$full_with_container == "on" ) {
				esport_container_before();
			}
		?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					if( $full_with_container == "off" or !$full_with_container == "on" ) {
						esport_row_before();
					}
				?>
					<?php esport_post_content_area_start(); ?>
						<div class="page-list page-content-list">
							<?php esport_post_featured_header( $post_id = get_the_ID() ); ?>
							<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="page-wrapper">
									<div class="page-content">
										<div class="page-content-body">
											<?php
												the_content();

												wp_link_pages( array(
													'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'esport' ) . '</span>',
													'after'       => '</div>',
													'link_before' => '<span>',
													'link_after'  => '</span>',
												) );
												
												edit_post_link( esc_html__( 'Edit Page', 'esport' ), '<span class="edit-link">', '</span>' );
											?>
										</div>
									</div>
								</div>
							</article>
						</div>
						<?php
							$page_comment_area = ot_get_option( 'page_comment_area' );
							if( $page_comment_area == "on" or !$page_comment_area == "off" ) {
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							}
						?>
					<?php esport_content_area_end(); ?>
					<?php get_sidebar(); ?> 
				<?php
					if( $full_with_container == "off" or !$full_with_container == "on" ) {
						esport_row_after();
					}
				?>
			<?php endwhile; ?>
		<?php
			if( $full_with_container == "off" or !$full_with_container == "on" ) {
				esport_container_after();
			}
		?>
	<?php esport_site_sub_content_end(); ?>

<?php get_footer();