<?php
/*
	* The template used for displaying single content
*/
?>

<div class="post-list post-content-list">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-wrapper">
			<div class="post-content-body">
				<?php
					echo '<div class="player-detail-left">';
						if ( has_post_thumbnail() ) {
							echo '<div class="player-wrapper">';
								$bg_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'esport-player-avatar' );
								echo '<div class="image" style="background-image:url(' . esc_url( $bg_url[0] ) . ');">';
									echo '<div class="content">';
										$player_username = get_post_meta( get_the_ID(), "player_username", true );
										if( !empty( $player_username ) ) {
											echo '<div class="username">' . esc_attr( $player_username ) . '</div>';
										}

										$official_web_site = get_post_meta( get_the_ID(), 'player_official_web_site', true );
										$social_media_facebook = get_post_meta( get_the_ID(), 'player_social_media_facebook', true );
										$player_social_media_twitch = get_post_meta( get_the_ID(), 'player_social_media_twitch', true );
										$social_media_twitter = get_post_meta( get_the_ID(), 'player_social_media_twitter', true );
										$social_media_googleplus = get_post_meta( get_the_ID(), 'player_social_media_googleplus', true );
										$social_media_instagram = get_post_meta( get_the_ID(), 'player_social_media_instagram', true );
										$social_media_youtube = get_post_meta( get_the_ID(), 'player_social_media_youtube', true );
										$social_media_flickr = get_post_meta( get_the_ID(), 'player_social_media_flickr', true );
										$social_media_soundcloud = get_post_meta( get_the_ID(), 'player_social_media_soundcloud', true );
										$social_media_vimeo = get_post_meta( get_the_ID(), 'player_social_media_vimeo', true );
											if( !empty( $official_web_site ) or !empty( $social_media_facebook ) or !empty( $player_social_media_twitch ) or !empty( $social_media_twitter ) or !empty( $social_media_googleplus ) or !empty( $social_media_instagram ) or !empty( $social_media_youtube ) or !empty( $social_media_flickr ) or !empty( $social_media_soundcloud ) or !empty( $social_media_vimeo ) ) {
											echo '<ul class="post-share">';
												if( !empty( $official_web_site ) ) {
													echo '<li><a href="' . esc_url( $official_web_site ) . '" class="officialsite" title="' . esc_html__( 'Facebook', 'esport' ) . '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
												}

												if( !empty( $social_media_facebook ) ) {
													echo '<li><a href="' . esc_url( $social_media_facebook ) . '" class="facebook" title="' . esc_html__( 'Facebook', 'esport' ) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
												}

												if( !empty( $player_social_media_twitch ) ) {
													echo '<li><a href="' . esc_url( $player_social_media_twitch ) . '" class="twitch" title="' . esc_html__( 'Twitch', 'esport' ) . '" target="_blank"><i class="fa fa-twitch"></i></a></li>';
												}
												
												if( !empty( $social_media_twitter ) ) {
													echo '<li><a href="' . esc_url( $social_media_twitter ) . '" class="twitter" title="' . esc_html__( 'Twitter', 'esport' ) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
												}

												if( !empty( $social_media_googleplus ) ) {
													echo '<li><a href="' . esc_url( $social_media_googleplus ) . '" class="googleplus" title="' . esc_html__( 'Google+', 'esport' ) . '" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
												}

												if( !empty( $social_media_instagram ) ) {
													echo '<li><a href="' . esc_url( $social_media_instagram ) . '" class="instagram" title="' . esc_html__( 'Instagram', 'esport' ) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
												}

												if( !empty( $social_media_youtube ) ) {
													echo '<li><a href="' . esc_url( $social_media_youtube ) . '" class="youtube" title="' . esc_html__( 'YouTube', 'esport' ) . '" target="_blank"><i class="fa fa-youtube"></i></a></li>';
												}

												if( !empty( $social_media_flickr ) ) {
													echo '<li><a href="' . esc_url( $social_media_flickr ) . '" class="flickr" title="' . esc_html__( 'Flickr', 'esport' ) . '" target="_blank"><i class="fa fa-flickr"></i></a></li>';
												}

												if( !empty( $social_media_soundcloud ) ) {
													echo '<li><a href="' . esc_url( $social_media_soundcloud ) . '" class="soundcloud" title="' . esc_html__( 'SoundCloud', 'esport' ) . '" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
												}

												if( !empty( $social_media_vimeo ) ) {
													echo '<li><a href="' . esc_url( $social_media_vimeo ) . '" class="vimeo" title="' . esc_html__( 'Vimeo', 'esport' ) . '" target="_blank"><i class="fa fa-vimeo"></i></a></li>';
												}
											echo "<ul>";
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				?>
				<?php the_content(); ?>
				<?php
					$player_twitch = get_post_meta( get_the_ID(), 'player_twitch', true );
					if( !empty( $player_twitch ) ) {
						echo '<div class="single-twitch-area">' . get_post_meta( get_the_ID(), 'player_twitch', true ) . '</div>';
					}
				?>
			</div>
		</div>
	</article>
</div>