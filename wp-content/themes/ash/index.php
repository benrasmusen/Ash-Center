<?php get_header(); ?>

	<!-- Content-->
	<div id="content">
		<div class="wrapper clearfix">
			<div class="inner-content clearfix"> 
				
			<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- Title-->
				<section class="title">
					<h1><?php the_title() ?></h1>
					<p></p>
				</section>
				<!-- /Title--> 
				<!-- Main-->
				<div id="main">
					<article class="post clearfix<?php if (!has_post_thumbnail()) echo ' no-post-thumb' ?>">
						<?php
						if (has_post_thumbnail()) {
							the_post_thumbnail('page-side-content', array('class' => 'alignleft'));
						}
						?>
						<div class="entry">
							<?php the_content() ?>
						</div>
					</article>
				</div>
				<!-- /Main--> 
				
			<?php endwhile; // end of the loop. ?>
				
			<!-- Sidebar-->
			<aside>
				<section class="widget box2">
					<h2>Learning More</h2>
					<h3>Patient Information Center</h3>
					<p>For a more detailed look at the conditions we address and our treatment plans, visit the Reference library in our Patient Information Center.</p>
					<p><a href="treatments-overview.html" class="button1">Read the info</a></p>
					<p><span class="divider">&nbsp;</span></p>
					<h3>Contact Us</h3>
					<p>Phone:  212-758-3200<br />
						Fax: 212-754-5800<br />
						Email: <a href="mailto:nfo@ashcenter.com">info@ashcenter.com</a></p>
					<p>Address: <br />
						800A Fifth Avenue <br />
						(Corner of 61st Street)  Suite 205 <br />
						New York, NY 10065</p>
					<div class="map"> <img src="/wp-content/themes/ash/images/google-map.jpg" alt="Map" /> </div>
				</section>
			</aside>
			<!-- /Sidebar--> 
			
		</div>
		
		<?php get_template_part('pre-footer') ?>
		
		<?php get_template_part('newsletter-form') ?>
		
	</div>
	<!-- /Content-->

<?php get_footer(); ?>