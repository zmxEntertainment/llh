<?php function esport_selection() {?>
	<?php echo esport_google_webfont(); 

	$ot_typgraphy_array = new esport_ot_font_settings;
	$ot_typgraphy_array->esport_ot_font_settings_echo('theme_main_one_font','body', 'Poppins');
	$ot_typgraphy_array->esport_ot_font_settings_echo('theme_main_two_font','h1,h2,h3,h5,h6,.esport-slider-carousel  .slider-wrapper .content .top-title,.esport-slider-carousel  .slider-wrapper .content .title,.content-title-element.size1 .title,.content-title-element.size1 .title,.content-title-element.size2 .title,.achievement-box .point,.achievement-box .content .title,.player-wrapper .content,.team-player-list li .player-wrapper .hover-content .view-profile,.player-team-list-wrapper .nav-tabs li a span,.esport-counter .number,.esport-counter .title,.fixtures-wrapper .fixture-list li .left .game,.fixtures-wrapper .fixture-list li .left .title,.fixtures-wrapper .fixture-list li .right .team-details .team-name,.fixtures-wrapper .fixture-list li .score-date,.fixtures-wrapper .nav-tabs li a span,.alternativeFont,.widget-title,.header-style-1 .header-main-area .header-menu .navbar .navbar-nav,.post-list-style-1 .image .category .post-categories,.post-list-style-1 .title,.post-list-style-2 .title,.content-title-wrapper .title', 'Khand');
	$ot_typgraphy_array->esport_ot_font_settings_echo('body_text','body', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h1_font','h1', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h2_font','h2', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h3_font','h3', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h4_font','h4', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h5_font','h5', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('h6_font','h6', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_font','h6', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','input::-webkit-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','input::-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','input:-ms-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','input:-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','.form-control::-webkit-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','.form-control::-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','.form-control:-ms-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','.form-control:-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','textarea::-webkit-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','textarea::-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','textarea:-ms-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','textarea:-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','select::-webkit-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','select::-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','select:-ms-input-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('input_placeholder_font','select:-moz-placeholder', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('button_font','button, input[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('header_font','.header', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('header_menu_link_font','.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a, .header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('page_title_font','.page-title-breadcrumbs h1', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('post_posts_content_font','.single-post .post-content-body', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('page_content_font','.page .page-content-body', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('404_page_title','.error404 .content-title-element.size1 .title', '');
	$ot_typgraphy_array->esport_ot_font_settings_echo('404_page_text','.error404 .content-title-element.size1 .description', '');

	?>
	<style id='esport-selection' type='text/css'>
		<?php 
			$ot_typgraphy_array->esport_css_output();
		?>
		
		/*----- CUSTOM COLOR START -----*/
		<?php if( ot_get_option('page_title_background') !== "" ) { ?>
			.page-title-breadcrumbs .page-title-breadcrumbs-image {
				background-image:url(<?php echo esc_url( ot_get_option('page_title_background') ); ?>);
			}
		<?php } ?>

		<?php if( ot_get_option('body_background') !== "" ) { ?>
			body {
				<?php echo esport_bg_type('body_background'); ?>
			}
		<?php } ?>

		<?php if( ot_get_option('wrapper_background') !== "" ) { ?>
			.esport-wrapper {
				background-color:<?php echo ot_get_option('wrapper_background'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('theme_gradient') !== "" ) { ?>
			.player-wrapper .image:after {
				<?php echo ot_get_option('theme_gradient'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_1_link_color') !== "" ) { ?>
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited {
				color:<?php echo ot_get_option('header_style_1_link_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_1_social_links_color') !== "" ) { ?>
			.header-style-1 .header-main-area .header-elements .header-search .header-search-content-wrapper>i,
			.header-style-1 .header-main-area .header-elements .social-links li a,
			.header-style-1 .header-main-area .header-elements .social-links li a:visited {
				color:<?php echo ot_get_option('header_style_1_social_links_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_2_link_color') !== "" ) { ?>
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited {
				color:<?php echo ot_get_option('header_style_2_link_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_2_social_links_color') !== "" ) { ?>
			.header-style-1.header-style-2 .header-main-area .header-elements .header-search .header-search-content-wrapper>i,
			.header-style-1.header-style-2 .header-main-area .header-elements .social-links li a,
			.header-style-1.header-style-2 .header-main-area .header-elements .social-links li a:visited {
				color:<?php echo ot_get_option('header_style_2_social_links_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_3_link_color') !== "" ) { ?>
			.header-style-1.header-style-3 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1.header-style-3 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited {
				color:<?php echo ot_get_option('header_style_3_link_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('header_style_3_social_links_color') !== "" ) { ?>
			.header-style-1.header-style-3 .header-main-area .header-elements .header-search .header-search-content-wrapper>i,
			.header-style-1.header-style-3 .header-main-area .header-elements .social-links li a,
			.header-style-1.header-style-3 .header-main-area .header-elements .social-links li a:visited {
				color:<?php echo ot_get_option('header_style_3_social_links_color'); ?>;
			}
		<?php } ?>

		<?php if( ot_get_option('theme_main_color') !== "" ) { ?>
			.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			.double-bounce1, .double-bounce2 {
				background-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.header.header-style-1.header-style-3 {
				border-bottom-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.woocommerce-info,
			.woocommerce-message,
			.woocommerce-error,
			#bbpress-forums li.bbp-header,
			#bbpress-forums li.bbp-footer,
			.header-style-1.header-style-3 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu {
				border-top-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.esport-contact-box .about-more-link, 
			.esport-contact-box .about-more-link:visited,
			.fixtures-wrapper .nav-tabs li.active a,
			.fixtures-wrapper .nav-tabs li.active a:visited,
			.fixtures-wrapper .nav-tabs li a:hover,
			.fixtures-wrapper .nav-tabs li a:focus,
			.logo-carousel .pagination-buttons>div:hover,
			.logo-carousel .pagination-buttons>div:focus,
			.esport-button.white a:hover,
			.esport-button.white a:focus,
			.esport-button a:hover,
			.esport-button a:focus,
			.player-team-list-wrapper .nav-tabs li.active a,
			.player-team-list-wrapper .nav-tabs li.active a:visited,
			.player-team-list-wrapper .nav-tabs li a:hover,
			.player-team-list-wrapper .nav-tabs li a:focus,
			.esport-slider-carousel  .slider-wrapper .content .buttons a:hover,
			.esport-slider-carousel  .slider-wrapper .content .buttons a:focus,
			.event-tag-widget ul li a:hover,
			.event-tag-widget ul li a:focus,
			.widget_tag_cloud .tagcloud a:hover,
			.widget_tag_cloud .tagcloud a:focus,
			.header.header-style-1.header-style-3,
			.error404 .page-404-home-button a,
			.error404 .page-404-home-button a:visited,
			.player-detail-left .post-share li a:hover,
			.player-detail-left .post-share li a:focus,
			.post-list-style-1 .bottom a.more-button,
			.post-list-style-1 .bottom a.more-button:visited,
			.post-list-style-2 .bottom a.more-button,
			.post-list-style-2 .bottom a.more-button:visited,
			.post-pagination ul li,
			.post-content-list .post-content-footer .post-share ul li a:hover,
			.post-content-list .post-content-footer .post-share ul li a:focus,
			.post-content-list .post-content-footer .post-tags span a,
			.post-content-list .post-content-footer .post-tags span a:visited,
			.post-navigation ul li,
			.post-author .about-author .about-content .author-social-links ul li a:hover,
			.post-author .about-author .about-content .author-social-links ul li a:focus,
			#bbpress-forums li.bbp-header,
			#bbpress-forums li.bbp-footer,
			#bbpress-forums li.bbp-header,
			.mobile-menu .user-box-links,
			.edit-link a, 
			.edit-link a:visited,
			.esport-pagination>li.esport-pagination-nav,
			.esport-pagination>li>a,
			.esport-pagination>li>a:visited,
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button,
			.woocommerce span.onsale,
			.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover {
				background:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.product-categories li a:hover,
			.product-categories li a:focus,
			.widget_meta ul li a:hover,
			.widget_meta ul li a:focus,
			.widget_rss ul li a:hover,
			.widget_rss ul li a:focus,
			.widget_recent_entries ul li a:hover,
			.widget_recent_entries ul li a:focus,
			.widget_recent_comments ul li a:hover,
			.widget_recent_comments ul li a:focus,
			.widget_nav_menu ul li a:hover,
			.widget_nav_menu ul li a:focus,
			.widget_archive ul li a:hover,
			.widget_archive ul li a:focus,
			.widget_pages ul li a:hover,
			.widget_pages ul li a:focus,
			.widget_categories ul li a:hover,
			.widget_categories ul li a:focus,
			.esport-contact-box i,
			.esport-contact-box .about-more-link:focus,
			.esport-contact-box .about-more-link:hover,
			.fixtures-wrapper .fixture-list li .left .game,
			.esport-counter .title,
			.esport-counter .number,
			.achievement-box .content .title,
			.content-title-element.size1.white .title span,
			.content-title-element.size1 .title span,
			.content-title-element.size1 .title span,
			.esport-slider-carousel  .slider-wrapper .content .top-title,
			.page-title-breadcrumbs .breadcrumbs a.home,
			.page-title-breadcrumbs .breadcrumbs a.home:visited,
			.page-title-breadcrumbs .breadcrumbs a:hover,
			.page-title-breadcrumbs .breadcrumbs a:focus,
			.header.header-style-1.fixed-header-class .header-main-area .header-elements .header-search .header-search-content-wrapper>i:focus,
			.header.header-style-1.fixed-header-class .header-main-area .header-elements .header-search .header-search-content-wrapper>i:hover,
			.header.header-style-1.fixed-header-class .header-main-area .header-elements .social-links li a:hover,
			.header.header-style-1.fixed-header-class .header-main-area .header-elements .social-links li a:focus,
			.header-style-1.header-style-2 .header-main-area .header-elements .social-links li a:hover,
			.header-style-1.header-style-2 .header-main-area .header-elements .social-links li a:focus,
			.header-style-1 .header-main-area .header-elements .social-links li a:hover,
			.header-style-1 .header-main-area .header-elements .social-links li a:focus,
			.header-style-1.header-style-4 .header-main-area .header-elements .social-links li a:hover,
			.header-style-1.header-style-4 .header-main-area .header-elements .social-links li a:focus,
			.header-style-1 .header-main-area .header-elements .header-search .header-search-content-wrapper>i:hover,
			.header-style-1.header-style-4 .header-main-area .header-elements .header-search .header-search-content-wrapper>i:hover,
			.header-style-1.header-style-4 .header-main-area .header-menu .navbar .navbar-nav>li>a,
			.header-style-1.header-style-4 .header-main-area .header-menu .navbar .navbar-nav>li>a:visited,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:hover,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:focus,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:hover,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav li .dropdown-menu li a:focus,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav>li:hover>a,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav>li>a:hover,
			.header-style-1.header-style-2 .header-main-area .header-menu .navbar .navbar-nav>li>a:focus,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li:hover>a,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:hover,
			.header-style-1 .header-main-area .header-menu .navbar .navbar-nav>li>a:focus,
			.footer-copyright.style2 a,
			.footer-copyright.style2 a:visited,
			.footer-copyright.style2 .menu li a:hover,
			.footer-copyright.style2 .menu li a:focus,
			.footer-copyright a,
			.footer-copyright a:visited,
			.footer-copyright .menu li a:hover,
			.footer-copyright .menu li a:focus,
			.footer.footer-style1 a:hover,
			.footer.footer-style1 a:focus,
			.footer.footer-style1  #menu-footer-menu li a:hover,
			.footer.footer-style1  #menu-footer-menu li a:focus,
			.footer #menu-footer-menu li a:before,
			.page404-wrapper .content-title-element i,
			.error404 .page-404-home-button a:hover,
			.error404 .page-404-home-button a:focus,
			.comment-list li cite,
			.comment-list li cite a, 
			.comment-list li cite a:visited,
			.post-list-style-1 .image .category .post-categories,
			.post-list-style-1 .image .category .post-categories a,
			.post-list-style-1 .image .category .post-categories a:visited,
			.post-list-style-1 .title a:hover,
			.post-list-style-1 .title a:focus,
			.post-list-style-1 .bottom a.more-button:hover,
			.post-list-style-1 .bottom a.more-button:focus,
			.post-list-style-1 .bottom .post-information li i,
			.post-list-style-2 .image .category .post-categories,
			.post-list-style-2 .image .category .post-categories a,
			.post-list-style-2 .image .category .post-categories a:visited,
			.post-list-style-2 .title a:hover,
			.post-list-style-2 .title a:focus,
			.post-list-style-2 .bottom a.more-button:hover,
			.post-list-style-2 .bottom a.more-button:focus,
			.post-list-style-2 .bottom .post-information li i,
			.post-list-style-3 .post-information i,
			.post-pagination ul li:hover,
			.post-pagination ul li:hover a,
			.post-pagination ul li:hover a:visited,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories a,
			.post-content-list .post-wrapper .post-featured-header .category .post-categories a:visited,
			.post-content-list .post-content-footer .post-information li i,
			.post-content-list .post-content-footer .post-tags span:hover a,
			.post-content-list .post-content-footer .post-tags span:focus a:visited,
			.post-navigation ul li:hover,
			.post-navigation ul li:hover a,
			.post-navigation ul li:hover a:visited,
			.post-author .about-author .about-content .author-name,
			.post-author .about-author .about-content .author-name a,
			.post-author .about-author .about-content .author-name a:visited,
			#bbpress-forums li .bbp-forum-title,
			#bbpress-forums li .bbp-forum-title:visited,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a:focus,
			.mobile-menu .mobile-menu-top .navbar-nav .dropdown-menu>.active>a:hover,
			.mobile-menu .mobile-menu-top .navbar-nav>li a:hover,
			.mobile-menu .mobile-menu-top .navbar-nav>li a:focus,
			.mobile-menu .mobile-menu-top .navbar-nav li:hover>a,
			.mobile-menu .mobile-menu-top .navbar-nav li:focus>a:visited,
			.mobile-menu .mobile-menu-top .navbar-nav li:hover>i,
			.mobile-menu .mobile-menu-top .navbar-nav li:focus>i,
			.mobile-menu .social-links li a:hover,
			.mobile-menu .social-links li a:focus,
			.edit-link a:focus,
			.edit-link a:hover,
			.esport-pagination>li>a:hover,
			.esport-pagination>li>a:focus,
			blockquote:before,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover,
			.cs-select > span::after,
			a:hover,
			a:focus,
			.woocommerce-info:before,
			.woocommerce-message:before,
			.woocommerce-error:before,
			.up-sells.upsells.products h2,
			.woocommerce #reviews h3,
			.related.products h2,
			.woocommerce-tabs h2,
			.woocommerce div.product form.cart .variations label,
			.woocommerce ul.products li.product .price,
			.woocommerce div.product p.price,
			.woocommerce div.product span.price,
			.woocommerce div.product .stock {
				color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.esport-contact-box .about-more-link:focus,
			.esport-contact-box .about-more-link:hover,
			.fixtures-wrapper .nav-tabs li.active a,
			.fixtures-wrapper .nav-tabs li.active a:visited,
			.fixtures-wrapper .nav-tabs li a:hover,
			.fixtures-wrapper .nav-tabs li a:focus,
			.esport-counter .number,
			.logo-carousel .pagination-buttons>div:hover,
			.logo-carousel .pagination-buttons>div:focus,
			.esport-button.white a:hover,
			.esport-button.white a:focus,
			.esport-button a:hover,
			.esport-button a:focus,
			.player-team-list-wrapper .nav-tabs li.active a,
			.player-team-list-wrapper .nav-tabs li.active a:visited,
			.player-team-list-wrapper .nav-tabs li a:hover,
			.player-team-list-wrapper .nav-tabs li a:focus,
			.esport-slider-carousel  .slider-wrapper .content .buttons a:hover,
			.esport-slider-carousel  .slider-wrapper .content .buttons a:focus,
			.event-tag-widget ul li a:hover,
			.event-tag-widget ul li a:focus,
			.widget_tag_cloud .tagcloud a:hover,
			.widget_tag_cloud .tagcloud a:focus,
			.error404 .page-404-home-button a,
			.error404 .page-404-home-button a:visited,
			.player-detail-left .post-share li a:hover,
			.player-detail-left .post-share li a:focus,
			.post-list-style-1 .bottom a.more-button,
			.post-list-style-1 .bottom a.more-button:visited,
			.post-list-style-2 .bottom a.more-button,
			.post-list-style-2 .bottom a.more-button:visited,
			.post-pagination ul li,
			.post-content-list .post-content-footer .post-share ul li a:hover,
			.post-content-list .post-content-footer .post-share ul li a:focus,
			.post-content-list .post-content-footer .post-tags span a,
			.post-content-list .post-content-footer .post-tags span a:visited,
			.post-navigation ul li,
			.post-author .about-author .about-content .author-social-links ul li a:hover,
			.post-author .about-author .about-content .author-social-links ul li a:focus,
			.edit-link a:focus,
			.edit-link a:hover,
			.esport-pagination>li>a:hover,
			.esport-pagination>li>a:focus,
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover,
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				border-color:<?php echo ot_get_option('theme_main_color'); ?>;
			}

			.post-list-style-1 .bottom a.more-button:hover,
			.post-list-style-1 .bottom a.more-button:focus,
			.post-list-style-2 .bottom a.more-button:hover,
			.post-list-style-2 .bottom a.more-button:focus {
				background: transparent;
			}
		<?php } ?>
		<?php if( ot_get_option('link_color') !== "" ) { ?>
			a, a:visited {
				color:<?php echo ot_get_option('link_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('link_hover_color') !== "" ) { ?>
			a:hover, a:focus {
				color:<?php echo ot_get_option('link_hover_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('heading_color') !== "" ) { ?>
			h1, h2, h3, h4, h5, h6 {
				color:<?php echo ot_get_option('heading_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('input_border_color') !== "" ) { ?>
			input[type="email"],
			input[type="number"],
			input[type="password"],
			input[type="tel"],
			input[type="url"],
			input[type="text"],
			input[type="time"],
			input[type="week"],
			input[type="search"],
			input[type="month"],
			input[type="datetime"],
			input[type="date"],
			textarea,
			textarea.form-control,
			select,
			.woocommerce form .form-row .select2-container .select2-choice,
			.form-control,
			div.cs-select,
			.cs-select {
				border-color:<?php echo ot_get_option('input_border_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('input_background_color') !== "" ) { ?>
			input[type="email"],
			input[type="number"],
			input[type="password"],
			input[type="tel"],
			input[type="url"],
			input[type="text"],
			input[type="time"],
			input[type="week"],
			input[type="search"],
			input[type="month"],
			input[type="datetime"],
			input[type="date"],
			textarea,
			textarea.form-control,
			select,
			.woocommerce form .form-row .select2-container .select2-choice,
			.form-control,
			div.cs-select,
			.cs-select {
				background:<?php echo ot_get_option('input_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_background_color') !== "" ) { ?>
			button,
			input[type="submit"],
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button {
				background:<?php echo ot_get_option('button_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_hover_background_color') !== "" ) { ?>
			button:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover {
				background:<?php echo ot_get_option('button_hover_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('button_hover_text_color') !== "" ) { ?>
			on:hover, input[type="submit"]:hover,
			button:active, input[type="submit"]:active,
			button:active:hover, input[type="submit"]:active:hover,
			button:active:focus, input[type="submit"]:active:focus,
			button:active:visited, input[type="submit"]:active:visited,
			button:focus, input[type="submit"]:focus,
			.woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce a.button:hover,
			.woocommerce button.button:hover,
			.woocommerce input.button:hover {
				color:<?php echo ot_get_option('button_hover_text_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_1_background_color') !== "" ) { ?>
			.header-style-1 {
				background:<?php echo ot_get_option('header_style_1_background_color'); ?>;
				border-bottom-color:<?php echo ot_get_option('header_style_1_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_2_background_color') !== "" ) { ?>
			.header-style-1.header-style-2 {
				background:<?php echo ot_get_option('header_style_2_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('header_style_3_background_color') !== "" ) { ?>
			.header-style-1.header-style-3 {
				background:<?php echo ot_get_option('header_style_3_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_1_background_color') !== "" ) { ?>
			.footer.footer-style1 {
				background:<?php echo ot_get_option('footer_style_1_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('footer_style_2_background_color') !== "" ) { ?>
			.footer.footer-style2 {
				background:<?php echo ot_get_option('footer_style_2_background_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('copyright_style_1_background') !== "" ) { ?>
			.footer-copyright {
				background:<?php echo ot_get_option('copyright_style_1_background'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('copyright_style_2_background') !== "" ) { ?>
			.footer-copyright.style2 {
				background:<?php echo ot_get_option('copyright_style_2_background'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('copyright_style_1_text_color') !== "" ) { ?>
			.footer-copyright a,
			.footer-copyright a:visited,
			.footer-copyright .menu li a,
			.footer-copyright .menu li a:visited,
			.footer-copyright {
				color:<?php echo ot_get_option('copyright_style_1_text_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('copyright_style_2_text_color') !== "" ) { ?>
			.footer-copyright.style2 a,
			.footer-copyright.style2 a:visited,
			.footer-copyright.style2 .menu li a,
			.footer-copyright.style2 .menu li a:visited,
			.footer-copyright.style2 {
				color:<?php echo ot_get_option('copyright_style_2_text_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('sidebar_widget_title_color') !== "" ) { ?>
			.widget-title {
				color:<?php echo ot_get_option('sidebar_widget_title_color'); ?>;
			}
		<?php } ?>
		<?php if( ot_get_option('sidebar_widget_title_border_color') !== "" ) { ?>
			.widget-title {
				border-bottom-color:<?php echo ot_get_option('sidebar_widget_title_border_color'); ?>;
			}
		<?php } ?>
		/*----- CUSTOM COLOR END -----*/
	</style>
<?php 
}
add_action('wp_head', 'esport_selection'); ?>