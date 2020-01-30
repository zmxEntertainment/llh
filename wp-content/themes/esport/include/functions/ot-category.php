<?php
/**
	* Category Custom Fields
 */
function esport_category_edit_settings( $term, $taxonomy ) {
	$esport_category_sidebar_style  = get_term_meta( $term->term_id, 'esport_category_sidebar_style', true );
	$esport_category_header_style  = get_term_meta( $term->term_id, 'esport_category_header_style', true );
	$esport_category_footer_style  = get_term_meta( $term->term_id, 'esport_category_footer_style', true );
	$esport_category_category_post_list_style  = get_term_meta( $term->term_id, 'esport_category_category_post_list_style', true );
?>

	<tr class="form-field gloria-custom-admin-row gloria-custom-admin-row-column">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Sidebar Style', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="esport_category_sidebar_style" id="esport-category-sidebar-1" value="nosidebar" class="radio" <?php if( $esport_category_sidebar_style == 'nosidebar' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-sidebar-1"><img for="esport-category-header-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/none-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'None Sidebar', 'esport' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="esport_category_sidebar_style" id="esport-category-sidebar-2" value="left" class="radio" <?php if( $esport_category_sidebar_style == 'left' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-sidebar-2"><img for="esport-category-header-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/left-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'Left Sidebar', 'esport' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="esport_category_sidebar_style" id="esport-category-sidebar-3" value="right" class="radio" <?php if( $esport_category_sidebar_style == 'right' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-sidebar-3"><img for="esport-category-header-3" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/right-sidebar.jpg'; ?>" alt="<?php echo esc_html__( 'Right Sidebar', 'esport' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>

	<tr class="form-field gloria-custom-admin-row gloria-custom-admin-row-column">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Post List Style', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="esport_category_category_post_list_style" id="esport-category-post-list-style-1" value="post-list-style-1" class="radio" <?php if( $esport_category_category_post_list_style == 'post-list-style-1' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-post-list-style-1"><img for="esport-category-post-list-style-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style1.jpg'; ?>" alt="<?php echo esc_html__( 'Style 1', 'esport' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="esport_category_category_post_list_style" id="esport-category-post-list-style-2" value="post-list-style-2" class="radio" <?php if( $esport_category_category_post_list_style == 'post-list-style-2' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-post-list-style-2"><img for="esport-category-post-list-style-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/vc-featured/post-style2.jpg'; ?>" alt="<?php echo esc_html__( 'Style 2', 'esport' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>

	<tr class="form-field gloria-custom-admin-row">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Header Style', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="esport_category_header_style" id="esport-category-header-1" value="header-style-1" class="radio" <?php if( $esport_category_header_style == 'header-style-1' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-header-1"><img for="esport-category-header-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/header-1.jpg'; ?>" alt="<?php echo esc_html__( 'Header Style 1', 'esport' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="esport_category_header_style" id="esport-category-header-2" value="header-style-2" class="radio" <?php if( $esport_category_header_style == 'header-style-2' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-header-2"><img for="esport-category-header-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/header-2.jpg'; ?>" alt="<?php echo esc_html__( 'Header Style 2', 'esport' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>

	<tr class="form-field gloria-custom-admin-row">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Footer Style', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="radio" name="esport_category_footer_style" id="esport-category-footer-1" value="footer-style-1" class="radio" <?php if( $esport_category_footer_style == 'footer-style-1' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-footer-1"><img for="esport-category-footer-1" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/footer-1.jpg'; ?>" alt="<?php echo esc_html__( 'Footer Style 1', 'esport' ); ?>"></label>
				</p>
			</div>

			<div>
				<p>
					<input type="radio" name="esport_category_footer_style" id="esport-category-footer-2" value="footer-style-2" class="radio" <?php if( $esport_category_footer_style == 'footer-style-2' ){ echo 'checked="checked"'; } ?>>
					<label for="esport-category-footer-2"><img for="esport-category-footer-2" src="<?php echo get_template_directory_uri() . '/admin/assets/images/admin/footer-2.jpg'; ?>" alt="<?php echo esc_html__( 'Footer Style 2', 'esport' ); ?>"></label>
				</p>
			</div>
		</td>
	</tr>

  <?php
}
add_action( 'category_edit_form_fields', 'esport_category_edit_settings', 10,2 );

function esport_category_settings_save( $term_id, $tt_id, $taxonomy ) { 
	if ( isset( $_POST['esport_category_sidebar_style'] ) ) {
		update_term_meta( $term_id, 'esport_category_sidebar_style', $_POST['esport_category_sidebar_style'] );
	}

	if ( isset( $_POST['esport_category_header_style'] ) ) {
		update_term_meta( $term_id, 'esport_category_header_style', $_POST['esport_category_header_style'] );
	}

	if ( isset( $_POST['esport_category_footer_style'] ) ) {
		update_term_meta( $term_id, 'esport_category_footer_style', $_POST['esport_category_footer_style'] );
	}

	if ( isset( $_POST['esport_category_category_post_list_style'] ) ) {
		update_term_meta( $term_id, 'esport_category_category_post_list_style', $_POST['esport_category_category_post_list_style'] );
	}
}
add_action( 'edit_term', 'esport_category_settings_save', 10,3 );