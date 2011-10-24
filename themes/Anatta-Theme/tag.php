<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<section class="body blog">
      		<div id="blog-inner" class="left-column">		
			<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php if( is_tag() ) { ?>
				<header><h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2></header>
			<?php /* If this is a daily archive */ } ?>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
				
			</header>
			<section class="posts">
				<?php 
				global $more;    // Declare global $more (before the loop).
				$more = 0;       // Set (inside the loop) to display content above the more tag.
				the_content("Read the Whole Article");
				?>
			</section>
			<footer> <!-- post metadata -->
				<p class="tag_page"><?php the_tags('<span >Tags:</span> ', ' ', ''); ?></p>
				
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
        </div>
            <div class="right-column">
        <div id="sidebar">
         <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar') ) : else : // Blog Sidebar?>
    <?php endif; ?>
  </div>
        </div>
        <div class="clear"></div>
	</section><?php get_footer(); ?>