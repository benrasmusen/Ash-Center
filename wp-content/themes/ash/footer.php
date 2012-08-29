					<!-- Two-column-layout1-->
					<section class="two-column-layout1 clearfix">
						<section id="testimonials" class="column flL">
							<section class="title">
								<h2>They got better - and so can you </h2>
								<p>Testimonials from patient who have experienced Dr Ash's program</p>
							</section>
							<ul class="list1">
								<li class="clearfix">
									<div class="description">
										<p>Competitive cyclist with back pain – RT therapy cured that...</p>
										<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
									</div>
									<img src="<?php bloginfo( 'template_url' ); ?>/images/testimonials/image1.jpg" alt="image1" />
								</li>
								<li class="clearfix">
									<div class="description">
										<p>This young woman’s son suffered from asthma for 11 years...</p>
										<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
									</div>
									<img src="<?php bloginfo( 'template_url' ); ?>/images/testimonials/image2.jpg" alt="image2" />
								</li>
								<li class="clearfix">
									<div class="description">
										<p>This older woman had uncontrollable diarrhea for 20 years...</p>
										<a rel="prettyPhoto" href="http://www.youtube.com/watch?v=vtXyEKd_x_0&feature=youtu.be" class="button1">play video</a>
									</div>
									<img src="<?php bloginfo( 'template_url' ); ?>/images/testimonials/image3.jpg" alt="image3" />
								</li>
							</ul>
							<a href="<?php home_url( '/' ) ?>testimonials/" class="button1">More success stories</a>
						</section>
						<section id="blog" class="column flR">
							<section class="title">
								<h2>Latest from The Ash Center BLOG</h2>
								<p>News, treatments and products for better </p>
							</section>
							<ul class="list1">
								<?php $my_query = new WP_Query( 'posts_per_page=3' ); ?>
								<?php if ( $my_query->have_posts() ): ?>
									<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
										<li class="clearfix<?php if ( ! has_post_thumbnail() ) echo " no-thumb"  ?>">
											<div class="description">
												<h3><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h3>
												<p><?php echo custom_home_excerpt( 120 ); ?></p>
											</div>
											<?php if ( has_post_thumbnail() ): ?>
												<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail(); ?></a>
											<?php endif ?>
										</li>
									<?php endwhile; ?>
								<?php else: ?>
									<li class="clearfix">
										<div class="description">
											<h3>No posts found...</h3>
											<p>Please add some blog posts to replace this message.</p>
										</div>
										<img src="<?php bloginfo( 'template_url' ); ?>/images/blog/image1.jpg" alt="image1" />
									</li>
								<?php endif ?>
							</ul>
							<?php if ( $my_query->have_posts() ): ?>
								<a href="<?php home_url( '/' ) ?>blog/" class="button1">more blog posts</a>
							<?php endif; ?>
						</section>
					</section>
					<!-- /Two-column-layout1-->
				
					<!-- Newsletter-form-->
					<section id="newsletter-form">
						<section class="form">
							<p class="clearfix">
								<?php if ( function_exists( 'mailchimpSF_signup_form' ) ): ?>
									<?php mailchimpSF_signup_form(); ?>
								<?php else: ?>
									<span class="notice">Please install the <a href="http://wordpress.org/extend/plugins/mailchimp/" title="WordPress &#8250; MailChimp List Subscribe Form &laquo; WordPress Plugins" target="_blank">MailChimp plugin</a> for this functionality.</spann>
								<?php endif ?>
							</p>
						</section>
						<h2>Sign up for Richard Ash, MD’s Newsletter</h2>
					</section>
					<!-- /Newsletter-form-->
					
				</div>
				<!-- /Content-->
				
				<footer id="footer">
					<div class="wrapper clearfix"> 
						<!-- Sociable-->
						<section class="sociable clearfix">
							<ul>
								<li class="phone">212 - 758 -3200</li>
								<li class="twitter"><a href="https://twitter.com/AshCenter" target="_blank">#RichardAshMD</a></li>
								<li class="facebook"><a href="http://www.facebook.com/pages/Richard-N-Ash-MD/113457665369741" target="_blank">Richard N. Ash MD</a></li>
								<li class="message"><a href="mailto:">Dr Ash</a></li>
							</ul>
						</section>
						<!-- /Sociable-->
						<section class="section">
							<h2>Preventive Alternative Therapies</h2>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/our-healing-approach/' ) ?>"><strong>Our Healing Approach</strong></a></li>
							</ul>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/whats-making-you-sick-tired/' ) ?>"><strong>What’s making you Sick &amp; Tired?</strong></a></li>
								<li><a href="<?php echo home_url( '/environment/' ) ?>">Environment</a></li>
								<li><a href="<?php echo home_url( '/foods-chemicals-preservatives/' ) ?>">Foods, chemicals &amp; preservatives</a></li>
								<li><a href="<?php echo home_url( '/stress/' ) ?>">Stress</a></li>
								<li><a href="<?php echo home_url( '/digestion/' ) ?>">Digestion</a></li>
								<li><a href="<?php echo home_url( '/alkaline-reserve/' ) ?>">Alkaline Reserve</a></li>
							</ul>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/our-unique-treatment/' ) ?>"><strong>Our Unique Treatment</strong></a></li>
								<li><a href="<?php echo home_url( '/diagnostics-testing/' ) ?>">Diagnostics &amp; Testing</a></li>
								<li><a href="<?php echo home_url( '/natural-dietary-supplements/' ) ?>">Natural Dietary Supplements</a></li>
								<li><a href="<?php echo home_url( '/simple-lifestyle-changes/' ) ?>">Simple Lifestyle Changes</a></li>
							</ul>
						</section>
						<section class="section">
							<h2>Our Specialities</h2>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/end-joint-pain/' ) ?>">Ending Joint Pain Without Surgery</a></li>
								<li><a href="<?php echo home_url( '/opening-arteries-without-surgery/' ) ?>">Opening Arteries without Surgery</a></li>
								<li><a href="<?php echo home_url( '/neutralization-of-allergies/' ) ?>">Neutralization of Allergies</a></li>
							</ul>
							<h2>The Buzz</h2>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/testimonials/' ) ?>">Testimonials</a></li>
								<li><a href="<?php echo home_url( '/in-the-news/' ) ?>">In The News</a></li>
								<li><a href="<?php echo home_url( '/radio-show/' ) ?>">Radio Show</a></li>
							</ul>
							<h2>Patient Information Center</h2>
							<ul class="list4">
								<li><a href="<?php echo home_url( '/faq/' ) ?>"><strong>FAQ</strong></a></li>
								<li><a href="<?php echo home_url( '/forms/' ) ?>"><strong>Forms</strong></a></li>
								<li><strong>Reference Library</strong></li>
								<li><a href="<?php echo home_url( '/treatments/' ) ?>">Treatments</a></li>
								<li><a href="<?php echo home_url( '/conditions/' ) ?>">Conditions</a></li>
								<li><a href="<?php echo home_url( '/nutrition/' ) ?>">Nutrition</a></li>
							</ul>
						</section>
						<section class="section last"> 
						<!-- Footer-navigation-->
						<nav id="footer-navigation">
							<ul>
								<li><a href="<?php echo home_url( '/' ) ?>">Home</a></li>
								<li><a href="<?php echo home_url( '/the-pure-essentials-story/' ) ?>">Pure Essentials</a></li>
								<li><a href="<?php echo home_url( '/blog/' ) ?>">Blog</a></li>
								<li><a href="<?php echo home_url( '/dr-ash/' ) ?>">Richard Ash, MD</a></li>
								<li><a href="<?php echo home_url( '/wellnest/' ) ?>">WellNEST</a></li>
								<li><a href="http://ws1713-1151.staging.nitrosell.com/store/" target="_blank">Store</a></li>
							</ul>
						</nav>
						<!-- /Footer-navigation--> 
					</section>
					<br class="clear" />
					<p><span class="center">&copy; 2012. Dr. Ash Center</span></p>
					<?php if (is_page('home')): ?>
						<section class="box1 first-visitor">
							<h2 class="clearfix"><a href="#" class="down-btn">&nbsp;</a>Are you a first time visitor?</h2>
							<div class="inner">
								<p>Learn about the top things to do at<br /> aschcenter.com</p>
								<a href="<?php echo home_url( '/dr-ash/' ) ?>" class="button2">Show me</a>
							</div>
						</section>
					<?php endif ?>
				</div>
	  		</footer>
		</div>
		
		<?php wp_footer(); ?>
		
	</body>
</html>