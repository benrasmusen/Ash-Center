<?php get_header(); ?>

	<!-- Content-->
	<div id="content">
		<div class="wrapper clearfix">
			<div class="inner-content clearfix"> 
				
			<?php while ( have_posts() ) : the_post(); ?>
				
				<!-- Title-->
				<section class="title">
					<h1><?php the_title() ?></h1>
					<?php if ($byline = get_post_meta($post->ID, 'byline', true)): ?>
						<p><?php echo $byline ?></p>
					<?php endif ?>
				</section>
				<!-- /Title--> 
				<!-- Main-->
				<div id="main">
					<article class="post clearfix<?php if (!has_post_thumbnail()) echo ' no-post-thumb' ?>">
						<?php if ($subheading = get_post_meta($post->ID, 'subheading', true)): ?>
							<h2><?php echo $subheading ?></h2>
						<?php endif ?>
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
					<?php 
					$dynamic_page_sidebar = get_post_meta($post->ID, 'dynamic_page_sidebar', true);
					if (!$dynamic_page_sidebar) {
						$dynamic_page_sidebar = 'learning-more';
					}
					?>
					<?php dynamic_sidebar($dynamic_page_sidebar) ?>
				</aside>
				<!-- /Sidebar--> 
			<?php endif ?>
			
		</div>

	<?php get_footer(); ?>