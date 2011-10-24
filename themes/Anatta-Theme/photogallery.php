<?php
/*
Template Name: Photo Gallery
*/
?>

<?php get_header(); ?>
	<section class="body blog">
    <div class="" style="float:left; width:600px;">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2><?php the_title(); ?></h2>
				
			</header>
			<section>
				<?php the_content(); ?>
			</section>
			
		</article>
		<?php endwhile; ?>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
        <div class="clear"></div>
        </div>
	<div class="right-column">
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar') ) : else : // Sidebar for wp pages ?>
    <?php endif; ?>
  </div>
  <div class="clear"></div>
	</section>
<?php get_footer(); ?>
