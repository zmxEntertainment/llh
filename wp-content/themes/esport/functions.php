<?php
	define( 'esport_VERSION', '1.2.4' );
	include ( get_template_directory() . '/include/functions/core.php');
	include  (get_template_directory() . '/include/functions/tgm.php' );
	include ( get_template_directory() . '/include/functions/widget.php' );
	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );
	add_filter( 'ot_theme_mode', '__return_true' );
	require get_template_directory() .'/include/functions/ot-fonts.php';
	require get_template_directory() .'/include/functions/ot-radioimages.php';
	require get_template_directory() .'/include/functions/ot-metaboxes.php';
	require get_template_directory() .'/include/functions/ot-themeoptions.php';
	require get_template_directory() .'/include/functions/ot-functions.php';
	require get_template_directory() .'/include/functions/ot-category.php';
	require get_template_directory() .'/include/functions/ot-game.php';
	require get_template_directory() .'/include/functions/ot-club.php';
	require get_template_directory() .'/include/functions/selection.php';
	if ( ! class_exists( 'OT_Loader' ) ) {
		require get_template_directory() .'/admin/ot-loader.php';
	}