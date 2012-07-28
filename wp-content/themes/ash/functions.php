<?php

/**
 * Theme support customizations
 */

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