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
	
	// Additional resize dimensions
	add_image_size('page-side-content', 287, 418); // for image to the left of page content
	
	// Learning More widget for content pages
	register_sidebar(array(
	    'id' => 'learning-more',
	    'name' => __('Learning More'),
		'before_title' => "<h3>\n",
		'after_title' => "</h3>\n",
		'before_widget' => "",
		'after_widget' => "",
	    'description' => __('This sidebar is located beside content on certain pages.'),
	));
	
}

require_once('includes/theme-functions.php');