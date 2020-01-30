<?php
/*
	* The template for displaying 404 page
*/
get_header(); ?>

	<?php esport_site_sub_content_start(); ?>
		<?php esport_container_before(); ?>
			<?php
				$page_home_button = ot_get_option( '404_page_home_button' );
				$page_search_form = ot_get_option( '404_page_search_form' );
			?>
			<div class="page404-wrapper">
				<div class="content-title-element dark size1">
					<div class="title"><?php echo esc_html__( '404', 'esport' ); ?> <span><?php echo esc_html__( 'Page', 'esport' ); ?></span></div>
					<div class="separate"><i class="fa fa-cubes" aria-hidden="true"></i></div>
					<div class="description"><?php echo esc_html__( 'Page not found! The page you are looking for cannot be found.', 'esport' ); ?></div>
				</div>
				<?php if( !$page_home_button == 'off' or $page_home_button == 'on' ) { ?>
					<div class="page-404-home-button">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e( 'Home', 'esport' ); ?>"><?php esc_html_e( 'Go to homepage', 'esport' ); ?></a>
					</div>
				<?php } ?>
				<?php if( !$page_search_form == 'off' or $page_search_form == 'on' ) { ?>
				<div class="page-404-search">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div>
							<input type="text" placeholder="<?php esc_html_e( 'Enter the keyword..', 'esport' ); ?>" name="s" class="search">
							<button type="submit"><i class="fa fa-search" aria-hidden="true"></i> <?php esc_html_e( 'Search', 'esport' ); ?></button>
						</div>
					</form>
				</div>
			</div>
			<?php } ?>
		<?php esport_container_after(); ?>
	<?php esport_site_sub_content_end(); ?>
	
<?php get_footer();
