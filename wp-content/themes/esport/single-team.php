<?php
/**
	* The template for displaying team single
*/
get_header(); ?>

	<?php esport_site_sub_content_start(); ?>
		<?php
			$post_post_title_each = get_post_meta( get_the_ID(), 'page_title', true );
			$post_post_title = ot_get_option( 'post_post_title' );
			if( !$post_post_title == 'off' or $post_post_title == 'on' ) {
				if( !$post_post_title_each == 'off' or $post_post_title_each == 'on' ) {
					esport_archive_title();
				}
			}
		?>
	
		<?php esport_container_before(); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php esport_row_before(); ?>
					<?php esport_post_content_area_start(); ?>
						<?php
							get_template_part( 'include/formats/content-team' );
						?>
					<?php esport_content_area_end(); ?>
					<?php get_sidebar(); ?> 
				<?php esport_row_after(); ?>
			<?php endwhile; ?>
		<?php esport_container_after(); ?>
	<?php esport_site_sub_content_end(); ?>

<?php get_footer();