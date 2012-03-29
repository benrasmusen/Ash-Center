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
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" charset="utf-8" />
	<!--[if lt IE 9]>
		<link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/css/ie.css"/>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>: Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<script src="<?php bloginfo('template_directory'); ?>/js/coda-slider.1.1.1.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-easing-1.3.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery-easing-compatibility.1.2.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		theInterval = function(cur){
		        clearInterval(theInt);
		        if( typeof cur != 'undefined' )
		                curclicked = cur;
		        $crosslink.removeClass("active-thumb");
		        $navthumb.eq(curclicked).parent().addClass("active-thumb");
		                $(".stripNav ul li a").eq(curclicked).trigger('click');
		        
		        theInt = setInterval(function() {
		                $crosslink.removeClass("active-thumb");
		                $navthumb.eq(curclicked).parent().addClass("active-thumb");
		                $(".stripNav ul li a").eq(curclicked).trigger('click');
		                curclicked++;
		                if( 6 == curclicked )
		                        curclicked = 0;
		                
		        }, 5000);
		};
		
		// DOM Ready
		$(function() {
		        
		        $("#main-photo-slider").codaSlider();
		        
		        $navthumb = $(".nav-thumb");
		        $crosslink = $(".cross-link");
		        
		        $navthumb
		                .click(function() {
		                        var $this = $(this);
		                        theInterval($this.parent().attr('href').slice(1) - 1);
		                        return false;
		                });
		        theInterval();
		});
		
	</script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
		$(".gallery-videos a[rel^='prettyPhoto']").prettyPhoto();
		$(".submenu").hover(
			function () {
			$('.child').slideDown("fast");
			},
			function () {
			$('.child').fadeOut("fast");
			}
		);
		$('.item-1').click(function(){
			$('html, body').animate({
			scrollTop: $('#item-1').offset().top
			}, 1500);
			return false;
		});
		$('.item-2').click(function(){
			$('html, body').animate({
			scrollTop: $('#item-2').offset().top
			}, 1500);
			return false;
		});
		$('.item-3').click(function(){
			$('html, body').animate({
			scrollTop: $('#item-3').offset().top
			}, 1500);
			return false;
		});
		$('.item-4').click(function(){
		$('html, body').animate({
			scrollTop: $('#item-4').offset().top
			}, 1500);
			return false;
		});
		$('.item-5').click(function(){
			$('html, body').animate({
			scrollTop: $('#item-5').offset().top
			}, 1500);
			return false;
		});
		
		$('.item-6').click(function(){
			$('html, body').animate({
				scrollTop: $('.id-item-6').offset().top
			}, 1500);
			return false;
		});
		$('.item-7').click(function(){
			$('html, body').animate({
			scrollTop: $('#item-7').offset().top
			}, 1500);
			return false;
		});
		
		$('.item-8').click(function(){
			$('html, body').animate({
			scrollTop: $('.gallery-map').offset().top
			}, 1500);
			return false;
		});
		$('.item-9').click(function(){
			$('html, body').animate({
				scrollTop: $('#item-9').offset().top
			}, 1500);
			return false;
		});
		$('.w-item-1').click(function(){
			$('html, body').animate({
				scrollTop: $('#schedule').offset().top
			}, 1500);
			return false;
		});
		$('.w-item-2').click(function(){
			$('html, body').animate({
				scrollTop: $('#event').offset().top
			}, 1500);
			return false;
		});
		$('.w-item-3').click(function(){
			$('html, body').animate({
				scrollTop: $('#about').offset().top
			}, 1500);
			return false;
		});							
		});
	</script>
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<?php //if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
</head>

<body >
<div id="container">
	<header class="main">
    <div class="body">
    <!--Hellobar Code-->
      <script type="text/javascript" src="//www.hellobar.com/hellobar.js"></script>
		<script type="text/javascript">
            new HelloBar(21651,39730);
        </script>
		  <!--Hellobar Code-->
          <!--Custom Header Code-->
		<a href="<?php bloginfo('url');?>"><img class="logo" src="<?php header_image(); ?>" width="306px" height="44px"  alt="" /></a>
         <!--Custom Header Code ends here-->
        <menu class="navigation">
        <?php 
			$url = explode('/',$_SERVER['REQUEST_URI']);
			$req_url = $url[1];
			
			if($req_url == '') {  $homeclass = "class='active'"; }
			
			
			if($req_url == 'dr-ash' || $req_url =='testimonials'  || $req_url == 'photo-gallery-3' || $req_url == 'story' || $req_url == 'radio-show') {  $drclass = "class='active'"; }
			if($req_url == 'blog' || is_search() || is_month() || is_author() || is_single() || is_category() || is_tag() || is_year() ) {  $blogclass = "class='active'"; } 
			if($req_url == 'wellnest'  || $req_url == 'trainer-listing' || $req_url == 'event-listing' || $req_url == 'location'  || $req_url == 'about' || $req_url == 'photo-gallery-2') {  $wellclass = "class='active'"; }
			if($req_url == 'ash-center' || $req_url == 'photo-gallery-1' || $req_url == 'patient-information' || $req_url == 'treatment-options' || $req_url == 'specialities' || $req_url =='location-ash-center') {  $ashclass = "class='active'"; }
						
		?>
        	<li <?=$drclass?>><a href="<?php bloginfo('url'); ?>/dr-ash">Dr. Ash <small>the expert</small></a></li>
            <li <?=$blogclass?>><a href="<?php bloginfo('url'); ?>/blog">Blog<small>advice/news</small></a></li>
            <li><a href="http://ws1713-1151.staging.nitrosell.com/store/" target="_blank">store<small>books/products</small></a></li>
            <li <?=$wellclass?>><a href="<?php bloginfo('url'); ?>/wellnest">wellnest<small>events/classes</small></a></li>
            <li <?=$ashclass?>><a href="<?php bloginfo('url'); ?>/ash-center">ash center<small>appointments</small></a></li>
        </menu>
    
    <?php //wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary', 'after' => '<span> '.$title.'</span>') ); ?>
	</div>
	</header>
    <?php if($req_url == 'blog' || is_search() || is_month() || is_author() || is_single() || is_category() || is_tag() || is_year() ) { ?>
    <div class="page-header"> <div class="body">Dr Ash’s Blog – advice and news from the leading experts in alternative medicine
    </div></div>
   <?php } 
	if($req_url == 'dr-ash' || $req_url =='testimonials'  || $req_url == 'photo-gallery-3' || $req_url == 'story' || $req_url == 'radio-show') { ?>
	<div class="page-header"><div class="body">Dr Ash – unique expertise and solutions through personal experience</div></div>
	<?php } if($req_url == 'wellnest' || $req_url == 'location'  || $req_url == 'about' || $req_url == 'photo-gallery-2' ) {?>
	<div class="page-header"><div class="body left">WellNest |<small>   "WellNest reopens on May 1st. New products, new classes, and new decor!"</small></div>
	
	<ul class="page-nav" id="w-page">
		<li class="w-item-1">Class Schedule</li><span>|</span>
		<li class="w-item-2">Events</li><span>|</span>
		<li class="w-item-3">About</li><span>|</span>
		<li class="w-item-4">Videos</li>
	</ul>
	
	</div>
   <?php } if($req_url == 'trainer-listing' ) {?>
	<div class="page-header"><div class="body"><a href="<?php bloginfo('url'); ?>/wellnest/">WellNest</a> - Trainer</div> </div>
 <?php } if($req_url == 'event-listing' ) {?>
	<div class="page-header"> <div class="body"><a href="<?php bloginfo('url'); ?>/wellnest/">WellNest</a> - Event</div></div>
   <?php } if($req_url == 'ash-center' || $req_url == 'photo-gallery-1' || $req_url == 'patient-information' || $req_url == 'treatment-options' || $req_url == 'specialities' || $req_url =='location-ash-center') {?>
	<div class="page-header"> <div class="body left">The Ash Center</div>
	<ul class="page-nav">
		<li>Healing Approach</li><span>|</span>
		<li class="submenu">What's Making You Sick & Tired
			<ul class="child">
				<li class="item-1">Environment</li>
				<li class="item-2">Food & Chemical Sensitivity</li>
				<li class="item-3">Digestion & Absorption</li>
				<li class="item-4">Stress</li>
				<li class="item-5">Acid-Alkaline Balance</li>
			</ul>
		</li><span>|</span>
		<li class="item-6">Specialties</li><span>|</span>
		<li class="item-7">Unique Treatments</li><span>|</span>
		<li class="item-8">Location</li><span>|</span>
		<li class="item-9">Patient Information</li>
	</ul>
	</div>
   <?php } ?>	