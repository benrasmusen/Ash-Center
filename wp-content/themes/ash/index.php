<?php
/*
Template Name: Blog Index
*/
?>
<?php get_header(); ?>

	<!-- Content-->
	<div id="content">
		<div class="wrapper clearfix">
			<div class="inner-content clearfix"> 
				
				<!-- Title-->
				<section class="title">
					<h1>The Ash Center Health and Wellness Blog</h1>
				</section>
				<!-- /Title--> 
				<!-- Main-->
				<div id="main">
					<div class="dr-richard-intro post">
						<h3>Richard Ash, MD</h3>
						<p>Richard Ash, MD, is an internal medicine specialist, author and radio talk show host who is a leader in the field of environmental medicine. Once a victim of his toxic environment, Dr. Ash realized there were no current methods of treatment that could deal with the toxicity in his body that was causing illness and fatigue. A graduate of the Medical College of Pennsylvania and having done personal research in alternative therapies, Dr. Ash founded The Ash Center for Comprehensive Medicine in New York City and developed a program that achieves dramatic, lasting improvement for patients who have not found relief from conventional methods.</p>
					</div>
			
					<?php $i=1; while ( have_posts() ) : the_post(); ?>
						
						<article class="post one-half clearfix<?php if ($i % 2 == 0) echo " alt" ?>">
								<h3><?php the_title(); ?></h3>
								<span class="metadata">Posted by <?php the_modified_author() ?>, on <?php the_modified_date() ?></span>
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail(); ?>
								<?php else: ?>
									<!-- TODO: Replace with placeholder image if no featured image exists -->
									<img src="<?php bloginfo('template_url'); ?>/images/blog/image1.jpg" alt="image1" />
								<?php endif ?>
								<?php the_excerpt(); ?>
								<section class="post-footer clearfix"> <a class="button1" href="<?php the_permalink() ?>">Read the Full Story</a> <a class="comments" href="<?php comments_link() ?>"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a> </section>
						</article>
					<?php $i++; endwhile; // end of the loop. ?>
					
				</div>
				<!-- /Main--> 
				
			<?php if (function_exists('dynamic_sidebar')): ?>
				<!-- Sidebar-->
				<aside>
					<?php dynamic_sidebar('blog-sidebar') ?>
				</aside>
				<!-- /Sidebar--> 
			<?php endif ?>
			
		</div>

<?php get_footer(); ?>