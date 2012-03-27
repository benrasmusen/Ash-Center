<?php get_header(); ?>
	<section class="index">
				
		<?php slidedeck( 871, array( 'width' => '100%', 'height' => '500px' ) ); //displaying slidedeck ?>
		<section class="block-1">
		<div class="body">
			<img src="<?php bloginfo('template_url') ?>/images/real-cure-img.jpg" alt="" title="" />
			<div class="content">
			<h1>A journey to find a real cure</h1>
			<p>After suffering from chronic joint pain for 10+ years whereby the only relief were prescribed pain killers, Dr. Ash went on a journey to find a real cure.</p>
			<p>
			 Utilizing his degree in Medicine and with countless years of alternative health research, Dr. Ash cured himself. And now he
			 help others in their battle against chronic diseases.</p>
			<a href="#" class="read-more"><span>Read the full story</span><small>  ></small></a>
			</div>
		</div>
		</section>
		<ul class="networks">
			<li class="item-1"><a href="http://www.facebook.com/DoctorAsh/" target="_blank" title="facebook">facebook</a></li>
		    <li class="item-2"><a href="http://www.twitter.com/RichardAshMD/" target="_blank" title="twitter">twitter</a></li>
		    <li class="item-3"><a href="#" target="_blank" title="Youtube">Youtube</a></li>
		</ul>
		<section class="body block-2">
			<header>
				<h1>Spreading the message</h1>
				<big></big>
			</header>
			<ul class="block-2-widgets">
				<li>
					<h2>Radio Show</h2>
					<img src="<?php bloginfo('template_url') ?>/images/radio-show-home-img.jpg" alt="" title="" />
					<big>In The Doctor's Office with Dr. Richard Ash</big>
				</li>
				<li>
					<h2>EDUCATING THE WORLD</h2>
					<img src="<?php bloginfo('template_url') ?>/images/edu-the-world-home-img.jpg" alt="" title="" />
					
					<big>Dr. Ash’s motto is less a motto and more a rally cry. The fact is, most people are ‘sick and tired of being sick and tired’. </big>
				</li>
				<li class="last-item">
					<h2>ORGANIZING THE BEST</h2>
					
					<img src="<?php bloginfo('template_url') ?>/images/org-the-best-img.jpg" alt="" title="" />
					<p>1ST Annual Mama Glow! </p>
					<h3>Film Festival</h3>
				</li>
			</ul>
		</section>
		<?php
		/*
        <!--Featured Event section-->
		Featured Event
	    <?php
			$pages = get_pages('child_of=71&sort_column=post_date&sort_order=desc&parent=71&showposts=1');
			foreach($pages as $page) {
			$event_date = get_post_meta($page->ID,'event_date', true);
		?>
        <div class="events" id="<?php echo $page->post_name; ?>"> <span><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></span><br/>
          <span><img src="<?php echo catch_that_image($page->post_content); ?>" width="500px" height="200px" /></span><br/>
         <?php echo apply_filters('the_excerpt', $page->post_excerpt); ?><span><a href="<?php echo get_page_link($page->ID) ?>">Learn more...</a></span> </div>
        <?php } ?>
         <!--Blog section-->
        Blog
        <div class="latest-blog">
		<?php //showing two latest posts 
         query_posts( "cat=-1&showposts=2" ); 
        if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div>
        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        <p><?php 
        $excerpts = get_the_excerpt();
        echo improved_trim_excerpt($excerpts); ?>
        </p>
        <a class="read-more" href="<?php the_permalink();?>">Read More >></a>
        </div>
        <?php endwhile; endif;
        wp_reset_query();
        ?>
        </div>
         <!--Radio Show section-->
        Radio Show
       <div class="radio-show">
		<?php include_once(ABSPATH.WPINC.'/feed.php');
         $rss = fetch_feed('http://www.wor710.com/pages/podcast/549.rss');
         $max = $rss->get_item_quantity(2);
         $rss_items = $rss->get_items(0, $max);
         ?>
         <ul>
        <?php
         foreach ( $rss_items as $item ) : ?>
         <li>
        <?php $title_feeds = $item->get_title();
        $feeds = explode('-',$title_feeds); ?>
         <a href='<?php echo $item->get_permalink(); ?>'
         title='<?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?>'>
         <?php echo $feeds[0]; ?></a>
        <?php echo $feeds[1]." - ".$feeds[2]; ?>
        <small>
        <?php  $play =  $item->get_permalink();
        insert_audio_player("[audio:$play]");  ?>
        </small>
         </li>
         <?php endforeach; ?>
         </ul>
        <a class="read-more" href="<?php bloginfo('url'); ?>/radio-show/">View all podcasts .....</a>
        </div>
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-widgets') ) : else : //sidebar for homepage ?>
        <?php endif; ?>

        */
        ?>
         
	</section>
<?php get_footer(); ?>
