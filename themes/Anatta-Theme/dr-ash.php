<?php
/*
Template Name: Dr Ash

*/
?>
<?php get_header(); ?>
<section class="body blog">
<div class="left-column">
<?php query_posts('p=36'); //Tracy Anderson Post ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1><?php the_title(); ?></h1>		
			</header>
			<section>
				<?php the_content(); ?>
			</section>	
		</article>
		<?php endwhile;endif; ?>	
		<?php wp_reset_query(); ?>
        </div>
	<div class="right-column">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('ash-page-sidebar') ) : else : // Sidebar for Dr. Ash ?>
    <?php endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php get_footer(); ?>