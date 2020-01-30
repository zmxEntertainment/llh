<?php
 
/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'esport_custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function esport_custom_theme_options() {

	/* OptionTree is not loaded yet, or this is not an admin request */
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;

	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( ot_settings_id(), array() );

	/**
	* Custom settings array that will eventually be 
	* passes to the OptionTree Settings API Class.
	*/
	
	$custom_settings = array(
		'contextual_help' => array(
			'content' => array(
				array(
					'id' => 'option_types_help',
					'title' => esc_html__( 'Header Settings', 'esport' ),
					'content' => '<p>' . esc_html__( 'Help content goes here!', 'esport' ) . '</p>'
				)
			),
			'sidebar' => '<p>' . esc_html__( 'Sidebar content goes here!', 'esport' ) . '</p>'
		),
		
		'sections' => array(
			array(
				'title' => '<span class="dashicons dashicons-admin-site"></span>' . esc_html__( 'General', 'esport' ),
				'id' => 'general'
			),
			array(
				'title' => '<span class="dashicons dashicons-admin-appearance"></span>' . esc_html__( 'Color', 'esport' ),
				'id' => 'colors'
			),
			array(
				'title' => '<span class="dashicons dashicons-editor-justify"></span>' . esc_html__( 'Typography', 'esport' ),
				'id' => 'fonts'
			),
			array(
				'title' => '<span class="dashicons dashicons-media-document"></span>' . esc_html__( 'Blog/Archive', 'esport' ),
				'id' => 'blog'
			),
			array(
				'title' => '<span class="dashicons dashicons-media-text"></span>' . esc_html__( 'Page', 'esport' ),
				'id' => 'page'
			),
			array(
				'title' => '<span class="dashicons dashicons-share"></span>' . esc_html__( 'Social Media', 'esport' ),
				'id' => 'socialmedia'
			),
			array(
				'title' => '<span class="dashicons dashicons-cart"></span>' . esc_html__( 'WooCommerce', 'esport' ),
				'id' => 'woocommerce'
			),
			array(
				'title' => '<span class="dashicons dashicons-hammer"></span>' . esc_html__( 'Custom Codes', 'esport' ),
				'id' => 'customcodes'
			),
		),

		'settings' => array(
			/*----- GENERAL TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'esport' ),
				'id' => 'general_tab1',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'General Sidebar Position', 'esport' ),
					'id' => 'sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position.', 'esport' ),
					'std' => 'right',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'Loader Status', 'esport' ),
					'id' => 'esport_loader',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can select the loader status.', 'esport' ),
					'std' => 'off',
					'section' => 'general'
				),
			array(
				'label' => esc_html__( 'Header', 'esport' ),
				'id' => 'general_tab2',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'Header Status', 'esport' ),
					'id' => 'hide_header',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the header.', 'esport' ),
					'std' => 'on',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'General Header Style', 'esport' ),
					'id' => 'default_header_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general header style.', 'esport' ),
					'std' => 'header-style-1',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Upload', 'esport' ),
					'id' => 'esport_logo',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload the your site logo for header.', 'esport' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/logo.png' . '',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Upload - Alternative', 'esport' ),
					'id' => 'esport_logo_alternative',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload the your alternative site logo for header.', 'esport' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/logo-alternative.png' . '',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Height', 'esport' ),
					'id' => 'logo_height',
					'type' => 'measurement',
					'desc' => esc_html__( 'You can enter the logo height for header. Recommended type px.', 'esport' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Logo Weight', 'esport' ),
					'id' => 'logo_width',
					'type' => 'measurement',
					'desc' => esc_html__( 'You can enter the logo weight for header. Recommended type px.', 'esport' ),
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Fixed', 'esport' ),
					'id' => 'header_fixed',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can make the fixed header.', 'esport' ),
					'std' => 'off',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Social Media', 'esport' ),
					'id' => 'header_social_media',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the social links from header.', 'esport' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
				array(
					'label' => esc_html__( 'Header Search', 'esport' ),
					'id' => 'header_search',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the search from header.', 'esport' ),
					'std' => 'on',
					'section' => 'general',
					'condition' => 'hide_header:is(on)'
				),
			array(
				'label' => esc_html__( 'Footer', 'esport' ),
				'id' => 'general_tab3',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'label' => esc_html__( 'Footer Status', 'esport' ),
					'id' => 'hide_footer',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the footer.', 'esport' ),
					'std' => 'on',
					'section' => 'general'
				),
				array(
					'label' => esc_html__( 'General Footer Style', 'esport' ),
					'id' => 'default_footer_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general footer style.', 'esport' ),
					'std' => 'footer-style-1',
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Footer Page For Style 1', 'esport' ),
					'id' => 'page_footer_style_1',
					'type' => 'page-select',
					'desc' => esc_html__( 'You can select the page for footer style 1.', 'esport' ),
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Footer Page For Style 2', 'esport' ),
					'id' => 'page_footer_style_2',
					'type' => 'page-select',
					'desc' => esc_html__( 'You can select the page for footer style 2.', 'esport' ),
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Copyright Text', 'esport' ),
					'id' => 'footer_copyright_text',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the copyright text.', 'esport' ),
					'section' => 'general',
					'condition' => 'hide_footer:is(on)'
				),
				array(
					'label' => esc_html__( 'Footer Copyright Menu', 'esport' ),
					'id' => 'hide_footer_copyright_menu',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the footer copyright menu.', 'esport' ),
					'std' => 'on',
					'section' => 'general'
				),
			array(
				'label' => esc_html__( 'Sidebar', 'esport' ),
				'id' => 'general_tab4',
				'type' => 'tab',
				'section' => 'general'
			),
				array(
					'id' => 'custom_sidebars',
					'desc' => '',
					'label' => esc_html__('Create Sidebars','esport'),
					'type' => 'list-item',
					'section' => 'general',
					'settings' => array(
						array(
							'label' => esc_html__('ID','esport'),
							'id' => 'id',
							'type' => 'text',
							'desc' => esc_html__('Please write a lowercase id, with <strong>no spaces</strong>','esport'),
						)
					)
				),
			/*----- GENERAL TAB END -----*/
			
			/*----- COLORS TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'esport' ),
				'id' => 'colors_tab1',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Body Background ', 'esport' ),
					'id' => 'body_background',
					'type' => 'background',
					'desc' => esc_html__( 'This is the body background of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Wrapper Background', 'esport' ),
					'id' => 'wrapper_background',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the wrapper background color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Theme Main Color', 'esport' ),
					'id' => 'theme_main_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the main color one of site. By setting a color here, all of your elements will use this color instead of default yellow color.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Gradient Code', 'esport' ),
					'id' => 'theme_gradient',
					'type' => 'css',
					'desc' => esc_html__( 'This is the theme gradient color of site. You can look the documentation file to create a gradient.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Link Color', 'esport' ),
					'id' => 'link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the link color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Link Hover Color', 'esport' ),
					'id' => 'link_hover_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the link hover color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Heading Color', 'esport' ),
					'id' => 'heading_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the heading(h1, h2, h3, h4, h5 and h6) color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Border Color', 'esport' ),
					'id' => 'input_border_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the input border color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Background Color', 'esport' ),
					'id' => 'input_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the input background color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Input Placeholder Color', 'esport' ),
					'id' => 'input_placeholder_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the input placeholder color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Background Color', 'esport' ),
					'id' => 'button_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the button background color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Hover Background Color', 'esport' ),
					'id' => 'button_hover_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the button hover background color of site.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Button Hover Text Color', 'esport' ),
					'id' => 'button_hover_text_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the button hover text color of site.', 'esport' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Header', 'esport' ),
				'id' => 'colors_tab2',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Header - Style 1 Background', 'esport' ),
					'id' => 'header_style_1_background_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is the background color for header style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 1 Link Color', 'esport' ),
					'id' => 'header_style_1_link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the link color for header style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 1 Social Links Color', 'esport' ),
					'id' => 'header_style_1_social_links_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the social links color for header style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 2 Background', 'esport' ),
					'id' => 'header_style_2_background_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is the background color for header style 2.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 2 Link Color', 'esport' ),
					'id' => 'header_style_2_link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the link color for header style 2.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 2 Social Links Color', 'esport' ),
					'id' => 'header_style_2_social_links_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the social links color for header style 2.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 3 Background', 'esport' ),
					'id' => 'header_style_3_background_color',
					'type' => 'colorpicker-opacity',
					'desc' => esc_html__( 'This is the background color for header style 3.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 3 Link Color', 'esport' ),
					'id' => 'header_style_3_link_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the link color for header style 3.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Header - Style 3 Social Links Color', 'esport' ),
					'id' => 'header_style_3_social_links_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the social links color for header style 3.', 'esport' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Footer', 'esport' ),
				'id' => 'colors_tab3',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Footer - Style 1 Background Color', 'esport' ),
					'id' => 'footer_style_1_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the background of footer style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Footer - Style 2 Background Color', 'esport' ),
					'id' => 'footer_style_2_background_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the background of footer style 2.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Copyright - Style 1 Background', 'esport' ),
					'id' => 'copyright_style_1_background',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the background color of copyright style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Copyright - Style 1 Text Color', 'esport' ),
					'id' => 'copyright_style_1_text_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the text color of copyright style 1.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Copyright - Style 2 Background', 'esport' ),
					'id' => 'copyright_style_2_background',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the background color of copyright style 2.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Copyright - Style 2 Text Color', 'esport' ),
					'id' => 'copyright_style_2_text_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the text color of copyright style 2.', 'esport' ),
					'section' => 'colors'
				),
			array(
				'label' => esc_html__( 'Widget & Sidebar', 'esport' ),
				'id' => 'colors_tab4',
				'type' => 'tab',
				'section' => 'colors'
			),
				array(
					'label' => esc_html__( 'Sidebar Widget Title Color', 'esport' ),
					'id' => 'sidebar_widget_title_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the widget title color.', 'esport' ),
					'section' => 'colors'
				),
				array(
					'label' => esc_html__( 'Sidebar Widget Title Border Color', 'esport' ),
					'id' => 'sidebar_widget_title_border_color',
					'type' => 'colorpicker',
					'desc' => esc_html__( 'This is the widget title border color.', 'esport' ),
					'section' => 'colors'
				),
			/*----- COLORS TAB END -----*/
			
			/*----- TYPOGRAPHY TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'esport' ),
				'id' => 'fonts_tab1',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label'       => esc_html__('Latin extended', 'esport'),
					'id'          => 'font_subsets_latin',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('Latin language on or off.','esport'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label'       => esc_html__('Cyrillic extended', 'esport'),
					'id'          => 'font_subsets_cyrillic',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('Cyrillic language on or off.','esport'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label'       => esc_html__('Greek extended', 'esport'),
					'id'          => 'font_subsets_greek',
					'type'        => 'on_off',
					'desc'        =>  esc_html__('Greek language on or off.','esport'),
					'section'     => 'fonts',
					'std'     => 'off'
				),
				array(
					'label' => esc_html__( 'Theme Main One Font', 'esport' ),
					'id' => 'theme_main_one_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the theme one font.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Theme Main Two Font', 'esport' ),
					'id' => 'theme_main_two_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the theme two font.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Body', 'esport' ),
					'id' => 'body_text',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the body for font settings.', 'esport' ),
					'section' => 'fonts',
					'std' => '',
				),
				array(
					'label' => esc_html__( 'H1', 'esport' ),
					'id' => 'h1_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h1 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H2', 'esport' ),
					'id' => 'h2_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h2 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H3', 'esport' ),
					'id' => 'h3_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h3 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H4', 'esport' ),
					'id' => 'h4_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h4 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H5', 'esport' ),
					'id' => 'h5_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h5 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'H6', 'esport' ),
					'id' => 'h6_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the h6 for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Input Font', 'esport' ),
					'id' => 'input_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the input for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Input Placeholder Font', 'esport' ),
					'id' => 'input_placeholder_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the input placeholder for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Button Font', 'esport' ),
					'id' => 'button_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the button for font settings.', 'esport' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Header', 'esport' ),
				'id' => 'fonts_tab2',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Header Font', 'esport' ),
					'id' => 'header_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the header font.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Header Menu Link Font', 'esport' ),
					'id' => 'header_menu_link_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the header menu link font.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( 'Page Title Font', 'esport' ),
					'id' => 'page_title_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the page title for font settings.', 'esport' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Single Post', 'esport' ),
				'id' => 'fonts_tab3',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Post Content Font', 'esport' ),
					'id' => 'post_posts_content_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the post content for font settings.', 'esport' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( 'Pages', 'esport' ),
				'id' => 'fonts_tab4',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( 'Page Content Font', 'esport' ),
					'id' => 'page_content_font',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the page content for font settings.', 'esport' ),
					'section' => 'fonts'
				),
			array(
				'label' => esc_html__( '404 Page', 'esport' ),
				'id' => 'fonts_tab5',
				'type' => 'tab',
				'section' => 'fonts'
			),
				array(
					'label' => esc_html__( '404 Page Title', 'esport' ),
					'id' => '404_page_title',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the 404 page title for font settings.', 'esport' ),
					'section' => 'fonts'
				),
				array(
					'label' => esc_html__( '404 Page Text', 'esport' ),
					'id' => '404_page_text',
					'type' => 'typography',
					'desc' => esc_html__( 'You can select the 404 page text for font settings.', 'esport' ),
					'section' => 'fonts'
				),
			/*----- TYPOGRAPHY TAB END -----*/
			
			/*----- BLOG TAB START -----*/
			array(
				'label' => esc_html__( 'Category', 'esport' ),
				'id' => 'blog_tab1',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Category Sidebar Position', 'esport' ),
					'id' => 'category_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of category page.', 'esport' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Category Post List Style', 'esport' ),
					'id' => 'blog_category_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general category post list style of category page.', 'esport' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Category Title', 'esport' ),
					'id' => 'blog_category_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the category title of category page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'id' => 'sidebar_select',
					'desc' => '',
					'label' => esc_html__('Sidebar For Categories','esport'),
					'type' => 'sidebar_select_category',
					'section' => 'blog',
				),
			array(
				'label' => esc_html__( 'Post', 'esport' ),
				'id' => 'blog_tab2',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Post Sidebar Position', 'esport' ),
					'id' => 'post_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of post.', 'esport' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Sidebar Select', 'esport' ),
					'id' => 'post_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of post.', 'esport' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Information', 'esport' ),
					'id' => 'post_post_information',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post information of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Category Name', 'esport' ),
					'id' => 'post_post_category_name',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post category name of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Image', 'esport' ),
					'id' => 'post_post_image',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post image of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Share Buttons', 'esport' ),
					'id' => 'post_post_share_buttons',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post share buttons of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tags', 'esport' ),
					'id' => 'post_post_tags',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post tags of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Title', 'esport' ),
					'id' => 'post_post_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post title of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Post Navigation', 'esport' ),
					'id' => 'post_post_navigation',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the post navigation of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Related Posts', 'esport' ),
					'id' => 'post_related_posts',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the related posts of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Related Posts Column', 'esport' ),
					'id' => 'post_related_posts_column',
					'type' => 'numeric-slider',
					'desc' => esc_html__( 'You can enter the related posts column.', 'esport' ),
					'std' => '3',
					'min_max_step'=> '2,3,1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Author Biography', 'esport' ),
					'id' => 'post_author_biography',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the author biography of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Comment Area', 'esport' ),
					'id' => 'post_post_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the comment area of post.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Tag', 'esport' ),
				'id' => 'blog_tab3',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Tag Sidebar Position', 'esport' ),
					'id' => 'tag_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of tag page.', 'esport' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Sidebar Select', 'esport' ),
					'id' => 'tag_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of tag page.', 'esport' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Post List Style', 'esport' ),
					'id' => 'tag_tag_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the tag post list style of tag page.', 'esport' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Tag Title', 'esport' ),
					'id' => 'tag_tag_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the tag title of tag page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Search', 'esport' ),
				'id' => 'blog_tab4',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Search Sidebar Position', 'esport' ),
					'id' => 'search_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of search page.', 'esport' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Sidebar Select', 'esport' ),
					'id' => 'search_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of search page.', 'esport' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Post List Style', 'esport' ),
					'id' => 'search_search_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the post list style of search page.', 'esport' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Search Title', 'esport' ),
					'id' => 'search_search_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the search title of search page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Archive', 'esport' ),
				'id' => 'blog_tab5',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Archive Sidebar Position', 'esport' ),
					'id' => 'archive_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of archive page.', 'esport' ),
					'std' => 'right',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Sidebar Select', 'esport' ),
					'id' => 'archive_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of archive page.', 'esport' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Post List Style', 'esport' ),
					'id' => 'archive_archive_post_list_style',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the category post list style of archive page.', 'esport' ),
					'std' => 'style1',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Archive Title', 'esport' ),
					'id' => 'archive_esport_archive_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the archive title of archive page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
			array(
				'label' => esc_html__( 'Attachment', 'esport' ),
				'id' => 'blog_tab6',
				'type' => 'tab',
				'section' => 'blog'
			),
				array(
					'label' => esc_html__( 'Attachment Sidebar Position', 'esport' ),
					'id' => 'attachment_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of attachment page.', 'esport' ),
					'std' => 'nosidebar',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Attachment Sidebar Select', 'esport' ),
					'id' => 'attachment_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of attachment page.', 'esport' ),
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Attachment Title', 'esport' ),
					'id' => 'attachment_attachment_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the attachment title of attachment page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Social Share Buttons', 'esport' ),
					'id' => 'attachment_social_share',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the social share buttons of attachment page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
				array(
					'label' => esc_html__( 'Comment Area', 'esport' ),
					'id' => 'attachment_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the comment area of attachment page.', 'esport' ),
					'std' => 'on',
					'section' => 'blog'
				),
			/*----- BLOG TAB END -----*/
			
			/*----- PAGES TAB START -----*/
			array(
				'label' => esc_html__( 'General', 'esport' ),
				'id' => 'page_tab1',
				'type' => 'tab',
				'section' => 'page'
			),
				array(
					'label' => esc_html__( 'Page Sidebar Position', 'esport' ),
					'id' => 'page_sidebar_position',
					'type' => 'radio-image',
					'desc' => esc_html__( 'You can select the general sidebar position of page.', 'esport' ),
					'std' => 'nosidebar',
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Sidebar Select', 'esport' ),
					'id' => 'page_sidebar_select',
					'type' => 'sidebar-select',
					'desc' => esc_html__( 'You can select the sidebar of page.', 'esport' ),
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Title', 'esport' ),
					'id' => 'page_title',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the page title of page.', 'esport' ),
					'std' => 'on',
					'section' => 'page'
				),
				array(
					'label' => esc_html__( 'Page Title Background', 'esport' ),
					'id' => 'page_title_background',
					'type' => 'upload',
					'desc' => esc_html__( 'You can upload the background for page title.', 'esport' ),
					'std' => '' . get_template_directory_uri() . '/assets/img/breadcrumbs-bg.jpg' . '',
					'section' => 'page',
				),
				array(
					'label' => esc_html__( 'Comment Area', 'esport' ),
					'id' => 'page_comment_area',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the comment area of page.', 'esport' ),
					'std' => 'on',
					'section' => 'page'
				),
			/*----- PAGES TAB END -----*/
			
			/*----- SOCIAL MEDIA TAB START -----*/
			array(
				'label' => esc_html__( 'Social Links', 'esport' ),
				'id' => 'socialmedia_tab1',
				'type' => 'tab',
				'section' => 'socialmedia'
			),
				array(
					'label' => esc_html__( 'Facebook URL', 'esport' ),
					'id' => 'social_media_facebook',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Facebook url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Twitter URL', 'esport' ),
					'id' => 'social_media_twitter',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Twitter url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Google+ URL', 'esport' ),
					'id' => 'social_media_googleplus',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Google+ url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Instagram URL', 'esport' ),
					'id' => 'social_media_instagram',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Instagram url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'LinkedIn URL', 'esport' ),
					'id' => 'social_media_linkedin',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the LinkedIn url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Vine URL', 'esport' ),
					'id' => 'social_media_vine',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Vine url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Pinterest URL', 'esport' ),
					'id' => 'social_media_pinterest',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Pinterest url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'YouTube URL', 'esport' ),
					'id' => 'social_media_youtube',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the YouTube url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Behance URL', 'esport' ),
					'id' => 'social_media_behance',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Behance url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'DeviantArt URL', 'esport' ),
					'id' => 'social_media_deviantart',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the DeviantArt url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Digg URL', 'esport' ),
					'id' => 'social_media_digg',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Digg url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Dribbble URL', 'esport' ),
					'id' => 'social_media_dribbble',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Dribbble url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Flickr URL', 'esport' ),
					'id' => 'social_media_flickr',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Flickr url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'GitHub URL', 'esport' ),
					'id' => 'social_media_github',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the GitHub url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Last.fm URL', 'esport' ),
					'id' => 'social_media_lastfm',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Last.fm url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Reddit URL', 'esport' ),
					'id' => 'social_media_reddit',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Reddit url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'SoundCloud URL', 'esport' ),
					'id' => 'social_media_soundcloud',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the SoundCloud url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Tumblr URL', 'esport' ),
					'id' => 'social_media_tumblr',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Tumblr url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Vimeo URL', 'esport' ),
					'id' => 'social_media_vimeo',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Vimeo url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'VK URL', 'esport' ),
					'id' => 'social_media_vk',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the VK url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Medium URL', 'esport' ),
					'id' => 'social_media_medium',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Medium url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Twitch URL', 'esport' ),
					'id' => 'social_media_twitch',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the Twitch url.', 'esport' ),
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'RSS URL', 'esport' ),
					'id' => 'social_media_rss',
					'type' => 'text',
					'desc' => esc_html__( 'You can enter the RSS url.', 'esport' ),
					'section' => 'socialmedia'
				),
			array(
				'label' => esc_html__( 'Social Share', 'esport' ),
				'id' => 'socialmedia_tab2',
				'type' => 'tab',
				'section' => 'socialmedia'
			),
				array(
					'label' => esc_html__( 'General Post Share', 'esport' ),
					'id' => 'hide_general_post_share',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the general post social share buttons.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Social Links For User Profile', 'esport' ),
					'id' => 'user_profile_social_links',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the social link for user profile.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Facebook Share', 'esport' ),
					'id' => 'social_share_facebook',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Facebook of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Twitter Share', 'esport' ),
					'id' => 'social_share_twitter',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Twitter of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Google+ Share', 'esport' ),
					'id' => 'social_share_googleplus',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Google+ of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Linkedin Share', 'esport' ),
					'id' => 'social_share_linkedin',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Linkedin of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Pinterest Share', 'esport' ),
					'id' => 'social_share_pinterest',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Pinterest of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Reddit Share', 'esport' ),
					'id' => 'social_share_reddit',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Reddit of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Delicious Share', 'esport' ),
					'id' => 'social_share_delicious',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Delicious of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Stumbleupon Share', 'esport' ),
					'id' => 'social_share_stumbleupon',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Stumbleupon of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
				array(
					'label' => esc_html__( 'Tumblr Share', 'esport' ),
					'id' => 'social_share_tumblr',
					'type' => 'on_off',
					'desc' => esc_html__( 'You can hide the Tumblr of social share.', 'esport' ),
					'std' => 'on',
					'section' => 'socialmedia'
				),
			/*----- SOCIAL MEDIA TAB END -----*/
			
			/*----- WOOCOMMERCE TAB START -----*/
			array(
				'label' => esc_html__( 'WooCommerce Sidebar Position - Shop Page', 'esport' ),
				'id' => 'woocommerce_sidebar_position',
				'type' => 'radio-image',
				'desc' => esc_html__( 'You can select the sidebar position of WooCommerce.', 'esport' ),
				'std' => 'right',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Sidebar Position - Single Product', 'esport' ),
				'id' => 'woocommerce_product_sidebar_position',
				'type' => 'radio-image',
				'desc' => esc_html__( 'You can select the sidebar position of WooCommerce single product.', 'esport' ),
				'std' => 'right',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Shop Product Column', 'esport' ),
				'id' => 'woocommerce_shop_product_column',
				'type' => 'numeric-slider',
				'desc' => esc_html__( 'You can enter the product column of WooCommerce shop page.', 'esport' ),
				'std' => '4',
				'min_max_step'=> '3,6,1',
				'section' => 'woocommerce'
			),
			array(
				'label' => esc_html__( 'WooCommerce Related Product Count', 'esport' ),
				'id' => 'woocommerce_related_product_count_column',
				'type' => 'numeric-slider',
				'desc' => esc_html__( 'You can enter the product count of WooCommerce related products.', 'esport' ),
				'std' => '4',
				'section' => 'woocommerce'
			),
			/*----- WOOCOMMERCE TAB END -----*/
			
			/*----- CUSTOM CODES TAB START -----*/
			array(
				'label' => esc_html__( 'Custom CSS Codes', 'esport' ),
				'id' => 'custom_css',
				'type' => 'css',
				'desc' => esc_html__( 'You can enter the custom CSS codes.', 'esport' ),
				'section' => 'customcodes'
			),
			array(
				'label' => esc_html__( 'Custom JavaScript Codes', 'esport' ),
				'id' => 'custom_js',
				'type' => 'javascript',
				'desc' => esc_html__( 'You can enter the custom JavaScript codes.', 'esport' ),
				'section' => 'customcodes'
			),
			/*----- CUSTOM CODES TAB END -----*/
		),
	);

	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings ); 
	}

	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_esport_custom_theme_options;
	$ot_has_esport_custom_theme_options = true;
}