<!DOCTYPE html>
<!--[if lte IE 7]><html class="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 7)|!(IE)]><! --><html <?php language_attributes(); ?>><!-- <![endif]-->
<head>
	<meta charset="utf-8" />
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
	<!-- http://google.com/webmasters -->
    <meta name="google-site-verification" content="" />
    <!-- don't allow IE9 to render the site in compatibility mode. Dude. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/anatta.jpg" type="image/x-icon" />

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie.css"/>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>: Feed" href="<?php bloginfo('rss2_url'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<?php //if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
</head>

<body >
	<header class="main">
    <div class="body">
    <!--Hellobar Code-->
      <script type="text/javascript" src="//www.hellobar.com/hellobar.js"></script>
		<script type="text/javascript">
            new HelloBar(21651,39730);
        </script>

		  <!--Hellobar Code-->
          
          <!--Custom Header Code-->
       	<?php
		// Check if this is a post or page, if it has a thumbnail, and if it's a big one
		if ( is_singular() &&
		has_post_thumbnail( $post->ID ) &&
		( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail') ) &&
		$image[1] >= HEADER_IMAGE_WIDTH ) :
		// We have a new header image!
		echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
		else : ?>
		<a href="<?php bloginfo('url');?>"><img style="margin-top:38px;" src="<?php header_image(); ?>" width="250px" height="60px"  alt="" /></a>
		<?php endif; ?>
         <!--Custom Header Code ends here-->
         
        <ul class="networks">
        	<li class="item-1"><a href="http://www.facebook.com/DoctorAsh/" target="_blank">facebook</a></li>
            <li class="item-2"><a href="http://www.twitter.com/RichardAshMD/" target="_blank">twitter</a></li>
            <li class="item-3"><a href="#" target="_blank">Youtube</a></li>
        </ul>
        <menu class="navigation">
        <?php 
			$url = explode('/',$_SERVER['REQUEST_URI']);
			$req_url = $url[1];
			if($req_url == 'dr-ash' || $req_url =='testimonials'  || $req_url == 'photo-gallery-3' || $req_url == 'story' || $req_url == 'radio-show') {  $drclass = "class='active'"; }
			if($req_url == 'blog' || is_search() || is_month() || is_author() || is_single() || is_category() || is_tag() || is_year() ) {  $blogclass = "class='active'"; } 
			if($req_url == 'wellnest'  || $req_url == 'trainer-listing' || $req_url == 'event-listing' || $req_url == 'location'  || $req_url == 'about' || $req_url == 'photo-gallery-2') {  $wellclass = "class='active'"; }
			if($req_url == 'ash-center' || $req_url == 'photo-gallery-1' || $req_url == 'patient-information' || $req_url == 'treatment-options' || $req_url == 'specialities' || $req_url =='location-ash-center') {  $ashclass = "class='active'"; }
						
		?>
        	<li <?=$drclass?>><a href="<?php bloginfo('url'); ?>/dr-ash">Dr. Ash <small>the expert</small></a></li>
            <li <?=$blogclass?>><a href="<?php bloginfo('url'); ?>/blog">Blog<small>advice/news</small></a></li>
            <li><a href="<?php bloginfo('url'); ?>/">store<small>books/products</small></a></li>
            <li <?=$wellclass?>><a href="<?php bloginfo('url'); ?>/wellnest">wellnest<small>events/classes</small></a></li>
            <li <?=$ashclass?>><a href="<?php bloginfo('url'); ?>/ash-center">ash center<small>appointments</small></a></li>
        </menu>
    
    <?php //wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary', 'after' => '<span> '.$title.'</span>') ); ?>
	</div>
	</header>
    <?php if($req_url == 'blog' || is_search() || is_month() || is_author() || is_single() || is_category() || is_tag() || is_year() ) { ?>
    <div class="page-header"> <div class="body">Blog – advice and news from the leading experts in alternative medicine
    </div></div>
   <?php } 
	if($req_url == 'dr-ash' ) { ?>
	<div class="page-header"><div class="body">Dr. Ash</div></div>
	<?php } if($req_url == 'wellnest' ) {?>
	<div class="page-header"><div class="body">WellNest</div></div>
   <?php } if($req_url == 'trainer-listing' ) {?>
	<div class="page-header"><div class="body"><a href="<?php bloginfo('url'); ?>/wellnest/">WellNest</a> - Trainer</div> </div>
 <?php } if($req_url == 'event-listing' ) {?>
	<div class="page-header"> <div class="body"><a href="<?php bloginfo('url'); ?>/wellnest/">WellNest</a> - Event</div></div>
   <?php } ?>	