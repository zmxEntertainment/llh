<?php
/**
	* Club Custom Fields
 */
function esport_club_edit_settings( $term, $taxonomy ) {
	$esport_club_logo  = get_term_meta( $term->term_id, 'esport_club_logo', true );
?>

	<tr class="form-field gloria-custom-admin-row">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Club Logo', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="text" name="esport_club_logo" id="esport-club-title-1" value="<?php if( !empty( $esport_club_logo ) ) { echo esc_url( $esport_club_logo ); }; ?>">
				</p>
			</div>
		</td>
	</tr>

  <?php
}
add_action( 'club_edit_form_fields', 'esport_club_edit_settings', 10,2 );

function esport_club_settings_save( $term_id, $tt_id, $taxonomy ) {
	if ( isset( $_POST['esport_club_logo'] ) ) {
		update_term_meta( $term_id, 'esport_club_logo', $_POST['esport_club_logo'] );
	}
}
add_action( 'edit_term', 'esport_club_settings_save', 10,3 );