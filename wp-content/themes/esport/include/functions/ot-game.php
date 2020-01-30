<?php
/**
	* Game Custom Fields
 */
function esport_game_edit_settings( $term, $taxonomy ) {
	$esport_game_logo  = get_term_meta( $term->term_id, 'esport_game_logo', true );
?>

	<tr class="form-field gloria-custom-admin-row">
		<th scope="row" valign="top">
			<label><?php esc_html_e( 'Game Logo', 'esport' ); ?></label>
		</th>
			
		<td>
			<div>
				<p>
					<input type="text" name="esport_game_logo" id="esport-game-title-1" value="<?php if( !empty( $esport_game_logo ) ) { echo esc_url( $esport_game_logo ); }; ?>">
				</p>
			</div>
		</td>
	</tr>

  <?php
}
add_action( 'game_edit_form_fields', 'esport_game_edit_settings', 10,2 );

function esport_game_settings_save( $term_id, $tt_id, $taxonomy ) {
	if ( isset( $_POST['esport_game_logo'] ) ) {
		update_term_meta( $term_id, 'esport_game_logo', $_POST['esport_game_logo'] );
	}
}
add_action( 'edit_term', 'esport_game_settings_save', 10,3 );