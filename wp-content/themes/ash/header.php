<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php echo is_home() ? 'Home' : wp_title(''); ?> | <?php bloginfo('name'); ?></title>
		<!-- http://google.com/webmasters -->
		<meta name="google-site-verification" content="" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!-- don't allow IE9 to render the site in compatibility mode. Dude. -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/prettyPhoto.css" />
		<link href='http://fonts.googleapis.com/css?family=Brawler' rel='stylesheet' type='text/css' />
		<!--[if lt IE 9]>
        	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="<?php bloginfo('template_directory') ?>/js/jquery-1.7.1.min.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/jquery.prettyPhoto.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/jquery.cycle.all.min.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/home.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/prettyphoto.js"></script>
		<script src="<?php bloginfo('template_directory') ?>/js/browser.js"></script>
		<?php wp_head(); ?>
	</head>
	<body class="home">
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
							<li><a href="http://ws1713-1151.staging.nitrosell.com/store/" target="_blank">Store</a></li>
							<li class="divider">|</li>
							<li><a href="wellnest.html">WellNEST</a></li>
							<li class="divider">|</li>
							<li><a href="dr-ash.html">Richard Ash, MD</a></li>
						</ul>
					</section>
				</div>
			</header>
			<!-- /Header--> 
			<!-- Main Navigation-->
			<nav id="main-navigation">
				<div class="wrapper">
					<ul class="clearfix">
						<li class="parent">
							<a href="#">Preventive Alternative Therapies</a>
							<section class="dropdown clearfix">
								<section class="section">
									<h2>Our Healing Approach</h2>
									<p>The Ash Center Comprehensive Medicine specializes in working with individuals who have been misdiagnosed, misunderstood, and are tired of being sick. </p>
									<ul>
										<li> <a href="healing-approach.html">Click here to know how to transform your health</a> </li>
									</ul>
								</section>
								<section class="section">
									<h2>What’s making you Sick &amp; Tired?</h2>
									<p>In order to understand the root causes of your illness we focus on 5 major areas that we believe contribute to most chronic illnesses: </p>
									<ul>
										<li> <a href="whats-making-you-sick-overview.html">Overview</a> </li>
										<li> <a href="environment.html">Environment</a> </li>
										<li> <a href="food-chemical-hypersensitivity.html">Foods, chemicals &amp; preservatives</a> </li>
										<li> <a href="stress.html">Stress</a> </li>
										<li> <a href="digestion-absorbtion.html">Digestion</a> </li>
										<li> <a href="acid-alkaline-balance.html">Alkaline Reserve</a> </li>
									</ul>
								</section>
								<section class="section last">
									<h2>Our Unique Treatment</h2>
									<p>In order to understand the root causes of your illness we focus on 5 major areas that we believe contribute to most chronic illnesses: </p>
									<ul>
										<li> <a href="unique-treatment.html">Overview</a> </li>
										<li> <a href="diagnostics-testing.html">Diagnostics &amp; Testing</a> </li>
										<li> <a href="natural-dietary-supplements.html">Natural Dietary Supplements</a> </li>
										<li> <a href="lifestyle-changes.html">Simple Lifestyle Changes</a> </li>
									</ul>
								</section>
							</section>
						</li>
						<li class="parent"><a href="#">Our Specialities</a>
							<section class="dropdown clearfix">
								<section class="section">
									<h2>Ending Joint Pain Without Surgery</h2>
									<p>Reconstructive Therapy and/or enhanced platelet rich plasma (prp) therapy</p>
									<ul>
										<li> <a href="end-joint-pain.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section">
									<h2>Opening Arteries without Surgery</h2>
									<p>Chelation Therapy is and Alternative to Bypass Surgery</p>
									<ul>
										<li> <a href="chelation-therapy.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section last">
									<h2>Neutralization of Allergies</h2>
									<p>At The Ash Center, we offer an immunotherapy program that is far more effective than traditional allergy de-sensitization treatments. </p>
									<ul>
										<li> <a href="neutralization-allergies.html">Learn more</a> </li>
									</ul>
								</section>
							</section>
						</li>
						<li><a href="pure-essentials.html">Pure Essentials</a></li>
						<li class="parent"><a href="#">The Buzz</a>
							<section class="dropdown clearfix">
								<section class="section">
									<h2>Testimonials</h2>
									<ul>
										<li> <a href="testimonials.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section">
									<h2>In The News</h2>
									<p>Dr. Ash has appeared on many major news and media outlets. Here is a sampling of some of his articles and appearances: </p>
									<ul>
										<li> <a href="news.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section last">
									<h2>Radio Show</h2>
									<p>"SICK &amp; TIRED of being SICK &amp; TIRED?" <br />
										Hosted by: Richard N. Ash, M.D.<br />
										Sundays 5-7 pm</p>
									<ul>
										<li> <a href="radio.html">Learn more</a> </li>
									</ul>
								</section>
							</section>
						</li>
						<li class="parent"><a href="#">Patient Information Center</a>
							<section class="dropdown clearfix">
								<section class="section">
									<h2>FAQ</h2>
									<p>Has Dr. Ash written any books?<br />
											Dr. Ash has authored two books:<br />
											DHEA: Unlocking the Secrets to the Fountain of Youth.</p>
									<ul>
										<li> <a href="faq.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section">
									<h2>Forms</h2>
									<p>Listed below are a number of important forms and reference guides that will help you get the most out of your experience at The Ash Center for Comprehensive Medicine. </p>
									<ul>
										<li> <a href="forms.html">Learn more</a> </li>
									</ul>
								</section>
								<section class="section last">
									<h2>Reference Library</h2>
									<p>For a more detailed look at the conditions we address and our treatment plans, visit the following links.</p>
									<ul>
										<li> <a href="treatments-overview.html">Treatments</a> </li>
										<li> <a href="conditions-overview.html">Conditions</a> </li>
										<li> <a href="nutrition.html">Nutrition</a> </li>
									</ul>
								</section>
							</section>
						</li>
						<li class="last"><a href="blog.html">Blog</a></li>
					</ul>
		  		</div>
			</nav>
			<!--/Main Navigation-->