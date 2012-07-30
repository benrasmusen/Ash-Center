<?php

/**
 * Theme support customizations
 */

if (function_exists('add_theme_support')) {
	
	// Menu Setup
	add_theme_support('menus');

	// Header top right navigation menu
	register_nav_menu('header_top_right', __( 'Header Top Right'));

	// Primary sub-header navigation
	register_nav_menu('primary', __( 'Primary Navigation'));

	// Primary Navigation Custom Walker Class
	require_once('includes/primary-nav-walker.php');

	// Cusotm header support
	add_theme_support('custom-header', array(
		'width' => 315,
		'height' => 51,
		'default-image' => get_template_directory_uri() . '/images/logo.jpg'
	));
	
	// Add post thumbnail support
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(104, 58, true); // default Post Thumbnail dimensions
	
}

require_once('includes/theme-functions.php');