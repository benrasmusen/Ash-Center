<?php

/**
 * Theme support customizations
 */

// Generic theme functions
require( 'includes/theme-functions.php' );

// Register and enqueue styles and scripts
function theme_styles_scripts() { 

	// Scripts
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.7.1.min.js' );
	wp_enqueue_script( 'jcarousel', get_template_directory_uri() . '/js/jcarousellite_1.0.1.min.js' );
	wp_enqueue_script( 'jquery-prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js' );
	wp_enqueue_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js' );
	wp_enqueue_script( 'home', get_template_directory_uri() . '/js/home.js' );
	wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/js/prettyphoto.js' );
	wp_enqueue_script( 'browser', get_template_directory_uri() . '/js/browser.js' );
	wp_enqueue_script( 'scroller', get_template_directory_uri() . '/js/scroller.js' );
	
	
	// Styles
	wp_register_style( 'main-styles', get_template_directory_uri() . '/style.css' );
	wp_register_style( 'pretty-photo', get_template_directory_uri() . '/prettyPhoto.css' );
	wp_register_style( 'google-font', 'http://fonts.googleapis.com/css?family=Brawler' );

  	wp_enqueue_style( 'main-styles' );
  	wp_enqueue_style( 'pretty-photo' );
  	wp_enqueue_style( 'google-font' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles_scripts' );

if ( function_exists( 'add_theme_support' ) ) {
	
	// Menu Setup
	add_theme_support( 'menus' );

	// Header top right navigation menu
	register_nav_menu( 'header_top_right', __( 'Header Top Right' ) );

	// Primary sub-header navigation
	register_nav_menu( 'primary', __( 'Primary Navigation' ) );

	// Primary Navigation Custom Walker Class
	require_once( 'includes/primary-nav-walker.php' );

	// Cusotm header support
	add_theme_support( 'custom-header', array(
		'width' 		=> 315,
		'height' 		=> 51,
		'default-image'	=> get_template_directory_uri() . '/images/logo.jpg'
	) );
	
	// Add post thumbnail support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 104, 58, true ); // default Post Thumbnail dimensions
	
	// Additional resize dimensions
	add_image_size( 'page-side-content', 287, 418 ); // for image to the left of page content
	add_image_size( 'gallery-thumbnail', 144, 112, true ); // for gallery thumbail images
	
	// Learning More widget for content pages
	register_sidebar( array(
	    'id'			=> 'learning-more',
	    'name'			=> __( 'Learning More' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description' 	=> __( 'This sidebar is located beside content on certain pages.' ),
	) );
	
	// WellNEST sidebar
	register_sidebar( array(
	    'id'			=> 'wellnest',
	    'name'			=> __( 'WellNEST' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description'	=> __( 'This sidebar is for the WellNEST page.' ),
	) );
	
	// FAQ sidebar
	register_sidebar( array( 
	    'id'			=> 'faq-sidebar',
	    'name'			=> __( 'FAQ Sidebar' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description'	=> __( 'This sidebar is for the FAQ page.' ),
	 ) );
	
	// Pure Essentials sidebar
	register_sidebar( array( 
	    'id'			=> 'pure-essentials',
	    'name'			=> __( 'Pure Essentials' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description'	=> __( 'This sidebar is for the Pure Essentials page.' ),
	 ) );
	
	// Dr. Ash sidebar
	register_sidebar( array( 
	    'id'			=> 'dr-ash',
	    'name'			=> __( 'Dr. Ash' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description'	=> __( 'This sidebar is for the Dr. Ash page.' ),
	 ) );
	
	// Blog sidebar
	register_sidebar( array( 
	    'id'			=> 'blog-sidebar',
	    'name'			=> __( 'Blog' ),
		'before_title'	=> "<h3>\n",
		'after_title'	=> "</h3>\n",
		'before_widget'	=> "",
		'after_widget'	=> "",
	    'description'	=> __( 'This sidebar is for the blog index.' ),
	 ) );
	
}

// Meta boxes
add_action( 'add_meta_boxes', 'page_details_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'page_details_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function page_details_add_custom_box() {
    add_meta_box( 'page_details_metabox','Page Details', 'page_details_inner_custom_box','page','normal','high' );
}

/* Prints the box content */
function page_details_inner_custom_box( $post ) {
	global $wp_registered_sidebars;
	
  	// Use nonce for verification
  	wp_nonce_field( plugin_basename( __FILE__ ), 'page_details_noncename' );

  	// The actual fields for data entry
	$markup = '<table>';
	$markup .= '<tbody class="list:meta">';
	$markup .=	'<tr>';
	$markup .=		'<td class="left">';
	$markup .= 			'<label for="dynamic_page_sidebar">' . __( "Select a sidebar" ) . '</label> ';
	$markup .=		'</td>';
	$markup .=		'<td>';
	$markup .= 			'<select name="dynamic_page_sidebar">';
	 					$sidebar = get_post_meta( $post->ID, 'dynamic_page_sidebar', true );
	 					if ( ! empty( $wp_registered_sidebars ) ) {
	 						foreach ( $wp_registered_sidebars as $key => $value ) {
								$markup .= '<option value="' . $key . '"' . selected( $key, $sidebar, false ) . '>' . $value['name'] . '</option>';
	 						}
	 					}
	$markup .= 			'</select>';
	$markup .=		'</td>';
	$markup .=	'</tr>';
	$markup .=	'<tr class="alternate">';
	$markup .=		'<td class="left">';
	$markup .= 			'<label for="subheading">' . __( "Subheading" ) . '</label> ';
	$markup .=		'</td>';
	$markup .=		'<td>';
	$markup .= 			'<textarea name="subheading" id="subheading" cols="50" rows="3">' . get_post_meta( $post->ID, 'subheading', true ) . '</textarea>';			
	$markup .=		'</td>';
	$markup .=	'</tr>';
	$markup .=	'<tr>';
	$markup .=		'<td class="left">';
	$markup .= 			'<label for="byline">' . __( "Byline" ) . '</label> ';
	$markup .=		'</td>';
	$markup .=		'<td>';
	$markup .= 			'<textarea name="byline" id="byline" cols="50" rows="3">' . get_post_meta( $post->ID, 'byline', true ) . '</textarea>';			
	$markup .=		'</td>';
	$markup .=	'</tr>';
	$markup .= '</tbody>';
	$markup .= '</table>';
	echo $markup;
}

/* When the post is saved, saves our custom data */
function page_details_save_postdata( $post_id ) {
	
	// verify if this is an auto save routine. 
  	// If it is our form has not been submitted, so we dont want to do anything
  	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;

  	// verify this came from the our screen and with proper authorization,
  	// because save_post can be triggered at other times
	if ( empty( $_POST['page_details_noncename'] ) || ! wp_verify_nonce( $_POST['page_details_noncename'], plugin_basename( __FILE__ ) ) )
		return;

  
	// Check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
			return;
	}

	// OK, we're authenticated: we need to find and save the data
	update_post_meta( $post_id, 'dynamic_page_sidebar', $_POST['dynamic_page_sidebar'] );
	update_post_meta( $post_id, 'subheading', $_POST['subheading'] );
	update_post_meta( $post_id, 'byline', $_POST['byline'] );
	
}