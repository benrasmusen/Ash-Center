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
				
			<?php if (function_exists('dynamic_sidebar')): ?>
				<!-- Sidebar-->
				<aside>
					<section class="widget box2">
						<h2>Learning More</h2>
						<?php dynamic_sidebar('learning-more') ?>
					</section>
				</aside>
				<!-- /Sidebar--> 
			<?php endif ?>
			
		</div>
		
		<?php get_template_part('pre-footer') ?>
		
		<?php get_template_part('newsletter-form') ?>
		
	</div>
	<!-- /Content-->

<?php get_footer(); ?>