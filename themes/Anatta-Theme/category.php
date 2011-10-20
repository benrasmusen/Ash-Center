<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<section class="body archive">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php single_cat_title(); ?></h1>
			
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				
			</header>
			<section>
				<?php 
				global $more;    // Declare global $more (before the loop).
				$more = 0;       // Set (inside the loop) to display content above the more tag.
				the_content("Read the Whole Article");
				?>
			</section>
			<footer> <!-- post metadata -->
				<p>Author Name: <?php the_author_posts_link(); ?>
				
			</footer>
		</article>
		<?php endwhile; ?>
		<nav class="pagination">
			<?php wp_pagenavi();//wordpress pagination ?>
		</nav>
		<?php else : ?>
		<article>
			<header>
				<h2>Not Found</h2>
			</header>
		</article>
		<?php endif; ?>
       <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('category-page-sidebar') ) : else : // Sidebar for Category section?>
    <?php endif; ?>
       
	</section>
<?php get_footer(); ?>