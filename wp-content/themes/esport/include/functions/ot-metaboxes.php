<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'esport_custom_meta_boxes' );
/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function esport_custom_meta_boxes() {

  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
		/*----- POST METABOXES START -----*/
		$post_meta_box = array(
			'id' => 'post_settings',
			'title' => esc_html__( 'Post Settings', 'esport' ),
			'pages' => array( 'post' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-header-settings',
					'label' => esc_html__( 'Header Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'header_status',
						'label' => esc_html__( 'Header Status', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the header.', 'esport' ),
					),
					array(
						'id' => 'header_layout_select',
						'label'	=> esc_html__( 'Header Style', 'esport' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select the post for header style.', 'esport' ),
					),
					array(
						'id' => 'page_title',
						'label' => esc_html__( 'Page Title', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the page title.', 'esport' ),
					),
				array(
					'id' => 'tab2-layout-settings',
					'label' => esc_html__( 'Layout Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'sidebar_position',
						'label'	=> esc_html__( 'Sidebar Position', 'esport' ),
						'desc' => esc_html__( 'You can select the post for sidebar position.', 'esport' ),
						'type' => 'radio-image',
					),
					array(
						'label' => esc_html__( 'Post For Sidebar', 'esport' ),
						'desc' => esc_html__( 'You can select the post for sidebar.', 'esport' ),
						'id' => 'post_sidebar_select',
						'type' => 'sidebar-select'
					),
					array(
						'id' => 'full_with_container',
						'label' => esc_html__( 'Full Width Container', 'esport' ),
						'type' => 'on_off',
						'std' => 'off',
						'desc' => esc_html__( 'You can make the full width contaienr.', 'esport' ),
					),
				array(
					'id' => 'tab3-featured-header',
					'label' => esc_html__( 'Featured Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'featured_header_status',
						'label' => esc_html__( 'Featured Header Status', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the featured header.', 'esport' ),
					),
					array(
						'id' => 'post_video_embed',
						'label' => esc_html__( 'Video Embed Code', 'esport' ),
						'desc' => esc_html__( 'You can enter the video embed code.', 'esport' ) . esc_attr( '<br><i>' ) . esc_html__( 'Example:', 'esport' ) . htmlspecialchars( ' &lt;iframe width=&quot;560&quot; height=&quot;315&quot; src=&quot;https://www.youtube-nocookie.com/embed/OYbXaqQ3uuo&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;' ) . esc_attr( '</i>' ),
						'type' => 'text'
					),
					array(
						'id' => 'post_audio_embed',
						'label' => esc_html__( 'Audio Embed Code', 'esport' ),
						'desc' => esc_html__( 'You can enter the audio embed code.', 'esport' ) . esc_attr( '<br><i>' ) . esc_html__( 'Example:', 'esport' ) . htmlspecialchars( ' &lt;iframe width=&quot;100%&quot; height=&quot;450&quot; scrolling=&quot;no&quot; frameborder=&quot;no&quot; src=&quot;https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/90909412&amp;amp;auto_play=false&amp;amp;hide_related=false&amp;amp;show_comments=true&amp;amp;show_user=true&amp;amp;show_reposts=false&amp;amp;visual=true&quot;&gt;&lt;/iframe&gt;' ) . esc_attr( '</i>' ),
						'type' => 'text'
					),
					array(
						'id' => 'post_images',
						'label' => esc_html__( 'Post Images', 'esport' ),
						'desc' => esc_html__( 'You can upload the images for gallery.', 'esport' ),
						'type' => 'gallery'
					),
				array(
					'id' => 'tab4-footer-settings',
					'label' => esc_html__( 'Footer Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'footer_status',
						'label' => esc_html__( 'Footer Status', 'esport' ),
						'desc' => esc_html__( 'You can hide the footer.', 'esport' ),
						'type' => 'on_off'
					),
					array(
						'id' => 'footer_layout_select',
						'label'	=> esc_html__( 'Footer Style', 'esport' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select the post for footer style.', 'esport' ),
					),
			)
		);
		ot_register_meta_box( $post_meta_box );
		/*----- POST METABOXES END -----*/
		
		/*----- PAGE METABOXES START -----*/
		$page_meta_box = array( 
			'id' => 'page_settings',
			'title' => esc_html__( 'Page Settings', 'esport' ),
			'pages' => array( 'page' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-header-settings',
					'label' => esc_html__( 'Header Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'header_status',
						'label' => esc_html__( 'Header Status', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the header.', 'esport' ),
					),
					array(
						'id' => 'header_layout_select',
						'label'	=> esc_html__( 'Header Style', 'esport' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select the page for header style.', 'esport' ),
					),
					array(
						'id' => 'page_title',
						'label' => esc_html__( 'Page Title', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the page title.', 'esport' ),
					),
					array(
						'id' => 'header_gap',
						'label' => esc_html__( 'Header Gap', 'esport' ),
						'type' => 'on_off',
						'std' => 'on',
						'desc' => esc_html__( 'You can remove the header gap.', 'esport' ),
					),
					
				array(
					'id' => 'tab2-layout-settings',
					'label' => esc_html__( 'Layout Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'sidebar_position',
						'label'	=> esc_html__( 'Sidebar Position', 'esport' ),
						'desc' => esc_html__( 'You can select the page for sidebar position.', 'esport' ),
						'type' => 'radio-image',
					),
					array(
						'label' => esc_html__( 'Page For Sidebar', 'esport' ),
						'desc' => esc_html__( 'You can select the page for sidebar.', 'esport' ),
						'id' => 'page_sidebar_select',
						'type' => 'sidebar-select'
					),
					array(
						'id' => 'full_with_container',
						'label' => esc_html__( 'Full Width Container', 'esport' ),
						'type' => 'on_off',
						'std' => 'off',
						'desc' => esc_html__( 'You can make the full width contaienr.', 'esport' ),
					),					
				array(
					'id' => 'tab3-footer-settings',
					'label' => esc_html__( 'Footer Settings', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'footer_status',
						'label' => esc_html__( 'Footer Status', 'esport' ),
						'type' => 'on_off',
						'desc' => esc_html__( 'You can hide the footer.', 'esport' ),
					),
					array(
						'id' => 'footer_layout_select',
						'label'	=> esc_html__( 'Footer Style', 'esport' ),
						'type' => 'radio-image',
						'desc' => esc_html__( 'You can select the page for footer style.', 'esport' ),
					),
					array(
						'id' => 'footer_gap',
						'label' => esc_html__( 'Footer Gap', 'esport' ),
						'type' => 'on_off',
						'std' => 'on',
						'desc' => esc_html__( 'You can remove the footer gap.', 'esport' ),
					),
			)
		);
		ot_register_meta_box( $page_meta_box );
		/*----- PAGE METABOXES END -----*/
		
		/*----- TEAM METABOXES START -----*/
		$page_meta_box = array( 
			'id' => 'team_settings',
			'title' => esc_html__( 'Team Settings', 'esport' ),
			'pages' => array( 'team' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-general-details',
					'label' => esc_html__( 'General Details', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'team_profession',
						'label' => esc_html__( 'Profession', 'esport' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the profession for team.', 'esport' ),
					),
				array(
					'id' => 'tab2-team-network',
					'label' => esc_html__( 'Network', 'esport' ),
					'type' => 'tab'
				),
					array(
						'label' => esc_html__( 'Official Web Site', 'esport' ),
						'id' => 'team_official_web_site',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the official web site for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Facebook URL', 'esport' ),
						'id' => 'team_social_media_facebook',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Facebook url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Twitter URL', 'esport' ),
						'id' => 'team_social_media_twitter',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Twitter url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Google+ URL', 'esport' ),
						'id' => 'team_social_media_googleplus',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Google+ url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Instagram URL', 'esport' ),
						'id' => 'team_social_media_instagram',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Instagram url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'YouTube URL', 'esport' ),
						'id' => 'team_social_media_youtube',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the YouTube url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Flickr URL', 'esport' ),
						'id' => 'team_social_media_flickr',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Flickr url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'SoundCloud URL', 'esport' ),
						'id' => 'team_social_media_soundcloud',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the SoundCloud url for team.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Vimeo URL', 'esport' ),
						'id' => 'team_social_media_vimeo',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Vimeo url for team.', 'esport' ),
					),
			)
		);
		ot_register_meta_box( $page_meta_box );
		/*----- TEAM METABOXES END -----*/
		
		/*----- FIXTURES METABOXES START -----*/
		$page_meta_box = array( 
			'id' => 'match_settings',
			'title' => esc_html__( 'Match Settings', 'esport' ),
			'pages' => array( 'fixtures' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'match_home_team',
					'label' => esc_html__( 'Home Team', 'esport' ),
					'type' => 'taxonomy-select',
					'taxonomy' => 'club',
					'desc' => esc_html__( 'You can select the home team.', 'esport' ),
				),
				array(
					'id' => 'match_home_team_score',
					'label' => esc_html__( 'Home Team Score', 'esport' ),
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the score for home team.', 'esport' ),
				),
				array(
					'id' => 'match_away_team',
					'label' => esc_html__( 'Away Team', 'esport' ),
					'type' => 'taxonomy-select',
					'taxonomy' => 'club',
					'desc' => esc_html__( 'You can select the away team.', 'esport' ),
				),
				array(
					'id' => 'match_away_team_score',
					'label' => esc_html__( 'Away Team Score', 'esport' ),
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the score for away team.', 'esport' ),
				),
				array(
					'id' => 'match_date',
					'label' => esc_html__( 'Match Date', 'esport' ),
					'type' => 'date-picker',
					'desc' => esc_html__( 'You can enter the match date.', 'esport' ),
				),
				array(
					'id' => 'match_time',
					'label' => esc_html__( 'Match Time', 'esport' ),
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the match time. Example: 13:00', 'esport' ),
				),
			)
		);
		ot_register_meta_box( $page_meta_box );
		/*----- FIXTURES METABOXES END -----*/
		
		/*----- PLAYER METABOXES START -----*/
		$page_meta_box = array( 
			'id' => 'player_settings',
			'title' => esc_html__( 'Player Settings', 'esport' ),
			'pages' => array( 'player' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'id' => 'tab1-general-details',
					'label' => esc_html__( 'General Details', 'esport' ),
					'type' => 'tab'
				),
					array(
						'id' => 'player_username',
						'label' => esc_html__( 'Username', 'esport' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the username for player.', 'esport' ),
					),
					array(
						'id' => 'player_twitch',
						'label' => esc_html__( 'Twitch Iframe', 'esport' ),
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the twitch iframe code for player.', 'esport' ),
					),
				array(
					'id' => 'tab2-player-network',
					'label' => esc_html__( 'Network', 'esport' ),
					'type' => 'tab'
				),
					array(
						'label' => esc_html__( 'Official Web Site', 'esport' ),
						'id' => 'player_official_web_site',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the official web site for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Facebook URL', 'esport' ),
						'id' => 'player_social_media_facebook',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Facebook url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Twitter URL', 'esport' ),
						'id' => 'player_social_media_twitter',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Twitter url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Twitch URL', 'esport' ),
						'id' => 'player_social_media_twitch',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Twitch url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Google+ URL', 'esport' ),
						'id' => 'player_social_media_googleplus',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Google+ url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Instagram URL', 'esport' ),
						'id' => 'player_social_media_instagram',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Instagram url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'YouTube URL', 'esport' ),
						'id' => 'player_social_media_youtube',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the YouTube url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Flickr URL', 'esport' ),
						'id' => 'player_social_media_flickr',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Flickr url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'SoundCloud URL', 'esport' ),
						'id' => 'player_social_media_soundcloud',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the SoundCloud url for player.', 'esport' ),
					),
					array(
						'label' => esc_html__( 'Vimeo URL', 'esport' ),
						'id' => 'player_social_media_vimeo',
						'type' => 'text',
						'desc' => esc_html__( 'You can enter the Vimeo url for player.', 'esport' ),
					),
			)
		);
		ot_register_meta_box( $page_meta_box );
		/*----- PLAYER METABOXES END -----*/

	/**
	* Register our meta boxes using the 
	* ot_register_meta_box() function.
	*/
}