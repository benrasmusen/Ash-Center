<?php get_header(); ?>
	<section class="body archive">
		<?php if (have_posts()) : ?>
			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php if (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="pagetitle">Author Archive</h1>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="pagetitle">Blog Archives</h1>
			<?php } ?>
			<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<?php the_time('M'); ?> <span><?php the_time('d');  //showing date of the post?></span>
                <br />
                <?php the_time('Y'); 
				
                //code for showing parent category only
				$parentscategory ="";
				foreach((get_the_category()) as $category) {
				if ($category->category_parent == 0) {
					$parentscategory .= '<span><a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a></span>, ';
					}
				}
				echo substr($parentscategory,0,-2); ?>
				<div><?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comments-link', ''); //comments count?></div>
				<h2><a href="<?php the_permalink(); ?>" title="permanent link to <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				
			</header>
			<section>
				<?php 
				global $more;    // Declare global $more (before the loop).
				$more = 0;       // Set (inside the loop) to display content above the more tag.
				the_content("Read the Whole Article");
				?>
			</section>
			<footer> <!-- post metadata -->
				<div class="leftFloat"> <a class="this-soc" href="<?php bloginfo('url');?>/?author=<?php echo $post->post_author ?>">
            <? userphoto_the_author_thumbnail(); //author thumbnail?>
            </a> Posted by
            <?php the_author_posts_link();//author link ?>
            on
            <?php the_time('M d, Y') ?><span class="paddingLR5">|</span> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
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
       <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('blog-sidebar') ) : else : // Blog Sidebar?>
    <?php endif; ?>
	</section>
<?php get_footer(); ?>
