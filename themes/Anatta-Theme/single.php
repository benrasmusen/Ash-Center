<?php get_header(); ?>
	<section class="body blog">
      <div id="blog-inner" class="left-column">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header id="single">
            <?php
            //code for showing parent category only
				//$parentscategory ="";
				//foreach((get_the_category()) as $category) {
				//if ($category->category_parent == 0) {
					//$parentscategory .= '<span><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></span>, ';
					//}
				//}
				//echo substr($parentscategory,0,-2);
			?>
					
				<h2><?php the_title(); ?></h2>
                <big><?php the_author(); ?></big> <small><?php the_time('F d'); ?></small>				
			</header>
			 <section class="posts">
				<?php the_content(); ?>
			</section>

        <!--Social sharing buttons code--->
			<footer> <!-- post metadata -->
            <div class="post-footer-share">
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
				<p><?php the_tags('<span>Tags:</span> ', ', ', ''); ?></p>
				<?php comments_template(); ?>
			</footer>
		</article>
		<?php endwhile; ?>
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
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single-page-sidebar') ) : else : // Sidebar for Blog?>
        <?php endif; ?>
        </div>
        </div>
        <div class="clear"></div>

	</section>
<?php get_footer(); ?>
