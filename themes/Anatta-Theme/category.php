<?php
/**
 * The template for displaying Category Archive pages.
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
			<?php /* If this is a category archive */ if (is_category()) { ?>
				<header><h2><?php single_cat_title(); ?></h2></header>
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
		<article class="cat-post" id="post-<?php the_ID(); ?>">
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
        <div class="post-footer-thumb left"> <a class="this-soc" href="<?php bloginfo('url');?>/?author=<?php echo $post->post_author ?>">
          <? userphoto_the_author_thumbnail(); //user thumbnail?>
          </a> </div>
        <div class="post-footer-content left"> Posted by
          <?php the_author_posts_link(); ?>
          on
          <?php the_time('M d, Y') ?>
          <span>|</span>
          <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
          <!--Social sharing buttons code---->
          <div class="post-footer-share-cat">
            <div class="left"></div>
            <fb:like profile_id="DoctorAsh" href="<?php the_permalink(); ?>" font="lucida grande" colorscheme="light" width="45" height="30" show_faces="false" layout="button_count"></fb:like>
            <!-- Place this tag where you want the +1 button to render -->
            <div class="right gplus">
              <g:plusone annotation="bubble" width="66" href="<?php the_permalink(); ?>"></g:plusone>
            </div>
            
            <!-- Place this render call where appropriate --> 
            <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
            <div class="right"> <a href="http://twitter.com/share?url=<?php echo urlencode(wp_get_shortlink()); ?>&amp;counturl=<?php urlencode(the_permalink()); ?>" class="twitter-share-button" data-count="horizontal" data-via="RichardAshMD">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> 
            </div>
            <!--Social sharing buttons code---> 
          </div>
        </div>
        <div class="clear"></div>
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
       <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('category-page-sidebar') ) : else : // Sidebar for Category section?>
    <?php endif; ?>
              </div>
        </div>
        <div class="clear"></div>
	</section>
<?php get_footer(); ?>