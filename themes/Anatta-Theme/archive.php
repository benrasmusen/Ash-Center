<?php get_header(); ?>
	<section class="body blog">
  <div class="left-column">
		<?php if (have_posts()) : ?>
        <header>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php if (is_day()) { ?>
				<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2>Archive for <?php the_time('F, Y'); ?></h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle">Author Archive</h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle">Blog Archives</h2>
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
          </header>  
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
            <div class="dated"> <span class="m-y">
          <?php the_time('M'); ?>
          <?php the_time('Y');  //showing date of the post?>
          </span> <span class="d">
          <?php the_time('d'); ?>
          </span>
          <div class="clear"></div>
          <span class="cat">
          <?php 
                //code for showing parent category only
				$parentscategory ="";
				foreach((get_the_category()) as $category) {
				if ($category->category_parent == 0) {
					$parentscategory .= '<span><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></span>, ';
					}
				}
				echo substr($parentscategory,0,-2); ?>
          </span>
          <div class="count-comment">
            <?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comments-link', ''); //comments count?>
          </div>
        </div>

		<h6><a href="<?php the_permalink(); ?>" title="permanent link to <?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
				
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
        </div>
      </footer>
		</article>
		<?php endwhile; ?>
		<nav class="pagination">
			<ul>
				<li><?php next_posts_link('&laquo; Older Entries') ?></li>
				<li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
			</ul>
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
</section>
<?php get_footer(); ?>
