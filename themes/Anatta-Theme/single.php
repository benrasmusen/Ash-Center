<?php get_header(); ?>
	<section class="body single">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
            <?php
            //code for showing parent category only
				$parentscategory ="";
				foreach((get_the_category()) as $category) {
				if ($category->category_parent == 0) {
					$parentscategory .= '<span><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></span>, ';
					}
				}
				echo substr($parentscategory,0,-2);
			?>
					
				<h1><?php the_title(); ?></h1>
                <big><?php the_author(); ?></big><small><?php the_time('F d'); ?></small>
				
				
			</header>
			<section>
				<?php the_content(); ?>
			</section>
            <br/>
              <!--Social sharing buttons code---->
            <span><fb:like profile_id="DoctorAsh" href="<?php the_permalink(); ?>" font="lucida grande" colorscheme="light" width="45" height="30" show_faces="false" layout="button_count"></fb:like></span>
          <a href="http://twitter.com/share?url=<?php echo urlencode(wp_get_shortlink()); ?>&amp;counturl=<?php urlencode(the_permalink()); ?>" class="twitter-share-button" data-count="horizontal" data-via="RichardAshMD">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> </span>
        <!-- Place this tag where you want the +1 button to render -->
        <g:plusone annotation="bubble" width="120" href="<?php the_permalink(); ?>"></g:plusone>
        
        <!-- Place this render call where appropriate -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
        <!--Social sharing buttons code--->
			<footer> <!-- post metadata -->
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
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single-page-sidebar') ) : else : // Sidebar for Blog?>
    <?php endif; ?>
	</section>
<?php get_footer(); ?>
