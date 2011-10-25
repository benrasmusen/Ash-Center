<?php
    // Load jQuery
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false);
        wp_enqueue_script('jquery');
    }

    // Clean up the <head>
    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    }
    add_action('init', 'removeHeadLinks');
	wp_deregister_script('l10n');
	
    // remove version info from head and feeds
    function complete_version_removal() {
        return '';
    }
    add_filter('the_generator', 'complete_version_removal');

    // custom excerpt.
    function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
            $text = get_the_content('');
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			if (stristr($text,"<style")) { //get rid of CSS.
				$text1 = explode("<style", $text);
				$text2 = explode("</style>", $text);
				$text = $text1[0] . $text2[1]; //this might work
			}
            $text = strip_tags($text, '<strong>');
            //ALLOWED tags (will be rendered) - could add more
            //They count against the word count below, though
			$excerpt_length = 25; //default excerpt is 55 words
			$words = explode(' ', $text, $excerpt_length + 1);
			
			if (count($words)> $excerpt_length) {
				array_pop($words);
				array_push($words, '...'); //indicates "read more..."
				$text = implode(' ', $words);
			}
		}
		return $text;
	}
    remove_filter('get_the_excerpt', 'wp_trim_excerpt');
    add_filter('get_the_excerpt', 'improved_trim_excerpt');

    //Support for Featured Images for posts or pages
    add_theme_support( 'post-thumbnails' );
	
    //Support for WP3 menus - create menus in the admin interface, then add them to widget areas in
    //the theme (like, say, the Nav widget area). Menus are not baked into this theme.
    add_theme_support( 'menus');
	
	// navigation menu
	if (function_exists('register_nav_menu')) {
	register_nav_menu('primary', __('Header Navigation Menu'));
	}

    // add custom content after each post
    function add_post_content($content) {
        if(!is_feed() && !is_home()) {
            //$content .= '<p>This article is copyright &copy; '.date('Y').'&nbsp;'.bloginfo('name').'</p>';
            $content .= '';
        }
        return $content;
    }
    add_filter('the_content', 'add_post_content');

    //enable shortcodes in widgets
    if (!is_admin()) {
        add_filter('widget_text', 'do_shortcode', 11);
    }

	// sidebars / widget areas: I have one in the header, nav, sidebar, and footer
    register_sidebar(array(
        'name' => 'Homepage Sidebar',
        'id'   => 'sidebar-widgets',
        'description'   => 'These are widgets for the homepage sidebar.',
        //'before_widget' => '<div id="%1$s" class="widget %2$s">',
        //'after_widget'  => '</div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Single Page sidebar',
        'id'   => 'single-page-sidebar',
        'description'   => 'These are widgets for the Post Description Page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id'   => 'blog-sidebar',
        'description'   => 'These are widgets for the blog.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>', // use h3's here?
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Category Page Sidebar',
        'id'   => 'category-page-sidebar',
        'description'   => 'These are widgets for the Category Page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
	
	register_sidebar(array(
        'name' => 'Dr. Ash Page Sidebar',
        'id'   => 'ash-page-sidebar',
        'description'   => 'These are widgets for Dr. Ash Page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
	
	register_sidebar(array(
        'name' => 'Wellnest Page Sidebar',
        'id'   => 'wellnest-page-sidebar',
        'description'   => 'These are widgets for Wellnest Page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
	register_sidebar(array(
        'name' => 'Page Sidebar',
        'id'   => 'page-sidebar',
        'description'   => 'These are widgets for wp Pages.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

	register_sidebar(array(
        'name' => 'Ash Center Sidebar',
        'id'   => 'ash-center-sidebar',
        'description'   => 'These are widgets for Ash Center Page.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
 
	//getting current category ID	
	function getCurrentCatID(){
	
	global $wp_query;
	
	if(is_category()){
	
	$cat_ID = get_query_var('cat');
	}
	
	return $cat_ID;
	
	}


    /** Tell WordPress to run yourtheme_setup() when the 'after_setup_theme' hook is run. */
    add_action( 'after_setup_theme', 'yourtheme_setup' );

    if ( ! function_exists('yourtheme_setup') ):
    /**
    * @uses add_custom_image_header() To add support for a custom header.
    * @uses register_default_headers() To register the default custom header images provided with the theme.
    *
    * @since 3.0.0
    */
    function yourtheme_setup() {

    // This theme uses post thumbnails
    //add_theme_support( 'post-thumbnails' );

    // Your changeable header business starts here
    define( 'HEADER_TEXTCOLOR', '' );
    // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
    define( 'HEADER_IMAGE', '%s/images/headers/forestfloor.jpg' );

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to yourtheme_header_image_width and yourtheme_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'yourtheme_header_image_width', 250 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'yourtheme_header_image_height', 60 ) );

    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall (larger images will be auto-cropped to fit).
    set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

    // Don't support text inside the header image.
    define( 'NO_HEADER_TEXT', true );

    // Add a way for the custom header to be styled in the admin panel that controls
    // custom headers. See yourtheme_admin_header_style(), below.
    add_custom_image_header( '', 'yourtheme_admin_header_style' );

    // … and thus ends the changeable header business.

    // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
    register_default_headers( array (
    'berries' => array (
    'url' => '%s/images/headers/berries.jpg',
    'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
    'description' => __( 'Berries', 'yourtheme' )
    ),
    'cherryblossom' => array (
    'url' => '%s/images/headers/cherryblossoms.jpg',
    'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
    'description' => __( 'Cherry Blossoms', 'yourtheme' )
    ),
    'concave' => array (
    'url' => '%s/images/headers/concave.jpg',
    'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
    'description' => __( 'Concave', 'yourtheme' )
    ),
    'fern' => array (
    'url' => '%s/images/headers/fern.jpg',
    'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
    'description' => __( 'Fern', 'yourtheme' )
    ),
    'forestfloor' => array (
    'url' => '%s/images/headers/forestfloor.jpg',
    'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
    'description' => __( 'Forest Floor', 'yourtheme' )
    ),
    'inkwell' => array (
    'url' => '%s/images/headers/inkwell.jpg',
    'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
    'description' => __( 'Inkwell', 'yourtheme' )
    ),
    'path' => array (
    'url' => '%s/images/headers/path.jpg',
    'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
    'description' => __( 'Path', 'yourtheme' )
    ),
    'sunset' => array (
    'url' => '%s/images/headers/sunset.jpg',
    'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
    'description' => __( 'Sunset', 'yourtheme' )
    )
    ) );
    }
    endif;

    if ( ! function_exists( 'yourtheme_admin_header_style' ) ) :
    /**
    * Styles the header image displayed on the Appearance > Header admin panel.
    *
    * Referenced via add_custom_image_header() in yourtheme_setup().
    *
    * @since 3.0.0
    */
    function yourtheme_admin_header_style() {
    ?>
    <style type="text/css">
    #headimg {
    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
    }
    #headimg h1, #headimg #desc {
    display: none;
    }
    </style>
    <?php
    }
    endif;

//function for getting first post image	
 function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    //$first_img = "/images/default.jpg";
  }
  else 
  {
 	  }
  return $first_img;
}

//adding excerpt support on wp page
add_post_type_support( 'page', 'excerpt' );
    ?>