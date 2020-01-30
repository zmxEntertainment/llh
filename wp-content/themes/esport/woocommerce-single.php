<?php
/**
	* The template for displaying woocommerce single
*/
get_header(); ?>

	<?php esport_site_sub_content_start(); ?>
		<?php esport_container_before(); ?>
			<?php esport_row_before(); ?>
				<?php esport_content_area_start(); ?>
					<div class="page-content">
						<?php woocommerce_content(); ?>
					</div>
				<?php esport_content_area_end(); ?>					
				<?php get_sidebar( 'shop' ); ?>				
			<?php esport_row_after(); ?>
		<?php esport_container_after(); ?>
	<?php esport_site_sub_content_end(); ?>
	
<?php get_footer();