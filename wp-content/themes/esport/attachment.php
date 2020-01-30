<?php
/**
	* The template for displaying attachment
*/
get_header(); ?>

	<?php esport_site_sub_content_start(); ?>
		<?php esport_archive_title(); ?>
		<?php esport_container_before(); ?>
			<?php esport_row_before(); ?>
				<?php esport_content_area_start(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'include/formats/content-attachment' ); ?>
					<?php endwhile; ?>
					<?php
						$attachment_comment_area = ot_get_option( 'attachment_comment_area' );
						if( $attachment_comment_area == "on" or !$attachment_comment_area == "off" ) {
							while ( have_posts() ) : the_post(); 
								if ( comments_open() || get_comments_number() ) {
									comments_template();
								}
							endwhile;
						}
					?>
				<?php esport_content_area_end(); ?>
				<?php get_sidebar(); ?>
			<?php esport_row_after(); ?>
		<?php esport_container_after(); ?>
	<?php esport_site_sub_content_end(); ?>

<?php get_footer();