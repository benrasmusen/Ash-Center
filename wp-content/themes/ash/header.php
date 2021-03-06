<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo ( isset( $post ) && $post->post_name == 'home' ) ? 'Home' : wp_title( '' ); ?> | <?php bloginfo( 'name' ); ?></title>
		<!-- http://google.com/webmasters -->
		<meta name="google-site-verification" content="" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
        	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style type="text/css" media="screen">
			/* Allow for dynamic header placement. */
			#header .logo h1 a span {background:url('<?php header_image(); ?>') left top no-repeat;}
		</style>
	</head>
	<body class="<?php if ( isset( $post ) ) echo $post->post_name; ?>">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div id="container"> 
			<!-- Header-->
			<header id="header" class="clearfix">
				<div class="wrapper">
					<section class="logo">
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="Go to homepage"><span class="png-bg">TAFE</span></a></h1>
					</section>
					<!-- Contact-->
					<section class="contact clearfix"> 
						<!-- Sociable-->
						<section class="sociable clearfix">
							<a href="http://www.facebook.com/pages/Richard-N-Ash-MD/113457665369741" target="_blank" class="facebook">&nbsp;</a> 
							<a href="https://twitter.com/AshCenter" target="_blank" class="twitter">&nbsp;</a> 
							<a href="mailto:" target="_blank" class="message">&nbsp;</a>
						</section>
						<!-- /Sociable-->
						<h2><span class="address">800A Fifth Ave (61st Street) New York, New York 10065</span><span class="phone">212-758-3200</span></h2>
					</section>
					<!-- /Contact-->
					<section class="user-area">
						<ul class="clearfix">
							<?php wp_nav_menu( array(
								'theme_location'  => 'header_top_right',
								'container'       => false, 
								'echo'            => true,
								'depth'           => 0,
								'after' 		  => '<li class="divider">|</li>'
							) ); ?>
						</ul>
					</section>
				</div>
			</header>
			<!-- /Header--> 
			<!-- Main Navigation-->
			<nav id="main-navigation">
				<div class="wrapper clearfix">
					<?php wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container' 	  => false,
						'echo'            => true,
						'depth'           => 5,
						'walker' 		  => new PrimaryNavWalker()
					) ); ?>
		  		</div>
			</nav>
			<!--/Main Navigation-->