<?php
/*
	* The template for displaying archive
*/
get_header(); ?>
	<?php esport_site_sub_content_start(); ?>
		<?php
			$archive_esport_archive_title = ot_get_option( 'archive_esport_archive_title' );
			if( !$archive_esport_archive_title == 'off' or $archive_esport_archive_title == 'on' ) {
				esport_archive_title();
			}
		?>
		<?php esport_container_before(); ?>
			<?php esport_row_before(); ?>
				<?php esport_content_area_start(); ?>
					<?php
					if ( have_posts() ) {
						esport_archive_post_list_styles();
						esport_pagination();		
					} else {
						get_template_part( 'include/formats/content', 'none' );
					}
					?>
				<?php esport_content_area_end(); ?>
				
				<?php get_sidebar(); ?> 
			<?php esport_row_after(); ?>
			
		<?php esport_container_after(); ?>
	<?php esport_site_sub_content_end(); ?>
	
<?php get_footer();