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
				<div id="main" class="clearfix">
					<article class="post clearfix">
						<?php while ( have_posts() ) : the_post(); ?>
							<section class="post-header">
								<a class="comments" href="<?php comments_link() ?>"><?php echo __( 'Comments' )?> </a> 
								<h2><?php the_title(); ?></h2>
								<p>Posted by <?php the_author() ?>, on <?php the_modified_date() ?></p>
							</section>
							<?php
							if (has_post_thumbnail()) {
								the_post_thumbnail('full');
							}
							?>
							<br /><br />
							<?php the_content() ?>
						<?php endwhile; ?>
					</article>
					
					<div id="comments" class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="2" data-width="695"></div>

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